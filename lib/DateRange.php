<?php 

	/**
	* Author: Abu Bakar Siddique (Shamrat)
	* 
	*/
	class DateRange
	{
		private $from_date;
		private $to_date;
		private $date_format = "Y-m-d";
		
		function __construct($from_date, $to_date)
		{
			$this->from_date = new DateTime($from_date);
			$this->to_date   = new DateTime($to_date);
		}
		/**
	     * Return difference between $to_date and $from_date
	     *
	     * @param return_format|String| params sample= %R%a days
	     * @return days in numeric from
	     */
		public function getDiff($return_format='%a')
		{
			return $this->to_date->diff($this->from_date)->format($return_format);
		}
		/**
	     * Genrate array of date according to date range
	     *
	     */
		public function getDateArrayOverRange()
		{
			$diff 		= $this->getDiff();
			$date_array = array();
			array_push($date_array, $this->from_date->format($this->date_format));
			for ($i=1; $i < $diff; $i++) { 
				$new_date = $this->from_date->add(new DateInterval('P1D'));
				array_push($date_array, $new_date->format($this->date_format));			
			}
			array_push($date_array, $this->to_date->format($this->date_format));

			return $date_array;

		}
		/**
	     * Set date format
	     *
	     * @param format|String
	     */
		public function setDateReturnFormat($format)
		{
			$this->date_format = $format;
		}
		/**
	     * Get from_date
	     * @param format|String
	     */
		public function getFromDate($format=0)
		{
			if ($format) {
				return $this->from_date->format($format);
			}
			return $this->from_date->format($this->date_format);

		}
		/**
	     * Get from_date
	     * @param format|String
	     */
		public function getToDate($format=0)
		{
			if ($format) {
				return $this->to_date->format($format);
			}
			return $this->to_date->format($this->date_format);
		}
	}


 ?>