<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Calendar creation library.
 */
class Calendar extends Calendar_Core {

	private $weekdays = array
	(
		'sunday',
		'monday',
		'tuesday',
		'wednesday',
		'thursday',
		'friday',
		'saturday',
	);

	public static function factory($month = NULL, $year = NULL, $start_monday = NULL)
	{
		return new Calendar($month, $year, $start_monday);
	}

	public function __construct($month = NULL, $year = NULL, $start_monday = NULL)
	{
		//echo Kohana::debug($start_monday);
		parent::__construct($month, $year, $start_monday);

		// Rotate the array for the right start day
		if ($this->week_start === 1) 
		{
			$day = $this->weekdays[0]; 
			array_shift($this->weekdays); 
			$this->weekdays[] = $day; 
		}
	}

	/**
	 * Convert the calendar to HTML using the kohana_calendar view.
	 *
	 * @return  string
	 */
	public function render($view = NULL)
	{
		($view === NULL) and $view = 'kohana_calendar';

		$view = new View($view, array
		(
			'weekdays' => $this->weekdays,
			'month'    => $this->month,
			'year'     => $this->year,
			'weeks'    => $this->weeks(),
		));

		return $view->render();
	}

	/**
	 * Returns an array for use with a view. The array contains an array for
	 * each week. Each week contains 7 arrays, with a day number and status:
	 * TRUE if the day is in the month, FALSE if it is padding.
	 *
	 * @return  array
	 */
	public function weeks()
	{
		// First day of the month as a timestamp
		$first = mktime(1, 0, 0, $this->month, 1, $this->year);

		// Total number of days in this month
		$total = (int) date('t', $first);

		// Last day of the month as a timestamp
		$last  = mktime(1, 0, 0, $this->month, $total, $this->year);

		// Make the month and week empty arrays
		$month = $week = array();

		// Number of days added. When this reaches 7, start a new week
		$days = 0;
		$week_number = 1;

		(($w = (int) date('w', $first) - $this->week_start) < 0) and $w = 6;

		if ($w > 0)
		{
			// Number of days in the previous month
			$n = (int) date('t', mktime(1, 0, 0, $this->month - 1, 1, $this->year));

			// i = number of day, t = number of days to pad
			for ($i = $n - $w + 1, $t = $w; $t > 0; $t--, $i++)
			{
				// Notify the listeners
				$this->notify(array($this->month - 1, $i, $this->year, $week_number, FALSE));

				// Add previous month padding days
				$week[] = array($i, FALSE, $this->observed_data);
				$days++;
			}
		}

		// i = number of day
		for ($i = 1; $i <= $total; $i++)
		{
			if ($days % 7 === 0)
			{
				// Start a new week
				$month[] = $week;
				$week = array();

				$week_number++;
			}

			// Notify the listeners
			$this->notify(array($this->month, $i, $this->year, $week_number, TRUE));

			// Add days to this month
			$week[] = array($i, TRUE, $this->observed_data);
			$days++;
		}

		$w = (int) date('w', $last) - $this->week_start;

		if ($w > -1 and $w < 6)
		{
			// i = number of day, t = number of days to pad
			for ($i = 1, $t = 6 - $w; $t > 0; $t--, $i++)
			{
				// Notify the listeners
				$this->notify(array($this->month + 1, $i, $this->year, $week_number, FALSE));

				// Add next month padding days
				$week[] = array($i, FALSE, $this->observed_data);
			}
		}

		if ( ! empty($week))
		{
			// Append the remaining days
			$month[] = $week;
		}

		return $month;
	}

} // End My Calendar