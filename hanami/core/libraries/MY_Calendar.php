<?php 
/**
 * Calendar creation library.
 */
class Calendar extends Calendar_Core {

	/**
	 * Returns an array of the names of the days, using the current locale.
	 *
	 * @param   integer  left of day names
	 * @return  array
	 */
	public static function days($length = TRUE)
	{
		// strftime day format
		$format = ($length === TRUE OR $length > 3) ? '%A' : '%a';

		// Days of the week
		$days = array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');

		if (Calendar::$start_monday === TRUE)
		{
			// Push Sunday to the end of the days
			array_push($days, array_shift($days));
		}

		if (strpos(Kohana::config('locale.language.0'), 'en') !== 0)
		{
			// This is a bit awkward, but it works properly and is reliable
			foreach ($days as $i => $day)
			{
				// Convert the English names to i18n names
				$days[$i] = strftime($format, strtotime($day));
			}
		}

		if (is_int($length) OR ctype_digit($length))
		{
			foreach ($days as $i => $day)
			{
				// Shorten the days to the expected length
				$days[$i] = utf8::substr($day, 0, $length);
			}
		}

		return $days;
	}

	/**
	 * Convert the calendar to HTML using the kohana_calendar view.
	 *
	 * @return  string
	 */
	public function render($view = NULL)
	{
		if($view === NULL)
			$view = 'kohana_calendar';

		$view = new View($view, array
		(
			'month'    => $this->month,
			'year'     => $this->year,
			'weeks'    => $this->weeks(),
		));

		return $view->render();
	}

} // End Calendar