<?php

class Calendar_Widget extends Widget {
	
	public function render() 
	{
		$year  = $this->input->get('year', date('Y'));
		$month = $this->input->get('month', date('n'));
		
		Calendar::$start_monday = TRUE;

		$calendar = Calendar::factory($month, $year)
			->standard('today')
			->standard('weekends')
			->standard('prev-next');

		return $calendar->render('calendar');
	}

	/**
	 * Magically convert this object to a string
	 *
	 * @return  string
	 */
	public function __toString()
	{
		return $this->render();
	}
}