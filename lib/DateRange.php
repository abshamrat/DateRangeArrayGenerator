<?php 

	/**
	* Author: Abu Bakar Siddique (Shamrat)
	* extends DateTime
	*/
	class DateRange
	{
		private $from_date;
		private $to_date;
		private $date_format = "Y-m-d";
		
		function __construct($from_date, $to_date)
		{
			$this->from_date = new DateTime($from_date);
			// $this->from_date = $this->from_date->format($this->date_format);
			
			$this->to_date   = new DateTime($to_date);
			// $this->to_date   = $this->to_date->format($this->date_format);
		}
		/**
	     * Return difference between $to_date and $from_date
	     *
	     * @param return_format|String| params sample= %R%a days
	     * @return days
	     */
		public function getDiff($return_format='%a')
		{
			return $this->to_date->diff($this->from_date)->format($return_format);
		}
		public function getDateArrayOverRange()
		{
			$diff 		= $this->getDiff();
			$date_array = array();
			array_push($date_array, $this->from_date);
			
			for ($i=1; $i < $diff; $i++) { 
				$this->from_date->add(DateInterval::createFromDateString($i.' days'));
				array_push($date_array, $this->from_date);			
			}
			array_push($date_array, $this->to_date);

			return $date_array;

		}
	}


 ?>