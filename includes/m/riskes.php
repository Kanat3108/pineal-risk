<?php

	function riskes_all(){
		global $wpdb;
		$table = $wpdb->prefix . 'pineal_risk';
		$query = "SELECT * FROM $table ORDER BY id_risk DESC";
		return $wpdb->get_results($query, ARRAY_A);
	}

	function riskes_current($code_risk){
		global $wpdb;
		$table = $wpdb->prefix . 'pineal_risk';
		$t = "SELECT text_risk, font_risk, bg_risk FROM $table WHERE code_risk='%s'";
		$query = $wpdb->prepare($t, $code_risk);
		return $wpdb->get_row($query, ARRAY_A);
	}

	
	function riskes_get($id){
		global $wpdb;
		$table = $wpdb->prefix . 'pineal_risk';
		$t = "SELECT text_risk, code_risk, font_risk, bg_risk FROM $table WHERE id_risk='%d'";
		$query = $wpdb->prepare($t, $id);
		return $wpdb->get_row($query, ARRAY_A);
	}

	function riskes_add($code, $text, $font, $bg){
		global $wpdb;
		$code = trim($code);
		$text = trim($text);
		$font = trim($font);
		$bg = trim($bg);
		$table = $wpdb->prefix . 'pineal_risk';
		$t = "INSERT INTO $table (code_risk, text_risk, font_risk, bg_risk) VALUES('%s','%s', '%s', '%s')";
		$query = $wpdb->prepare($t, $code, $text, $font, $bg);
		$result = $wpdb->query($query);

		if ($result === false ) {
			die('Error Database');
			return true;
		}
	}

	function riskes_edit($code, $text, $font, $bg, $id){
		global $wpdb;
		$code = trim($code);
		$text = trim($text);
		$font = trim($font);
		$bg = trim($bg);

		if ($code == '' || $text == '' ) {
			return false;
		}

		$table = $wpdb->prefix . 'pineal_risk';
		$t = "UPDATE $table SET code_risk='%s', text_risk='%s', font_risk='%s' , bg_risk = '%s' WHERE id_risk='%d'";
		$query = $wpdb->prepare($t, $code, $text, $font, $bg, $id);
		$result = $wpdb->query($query);

		if ($result === false ) {
			die('Error Database');
			return true;
		}
	}

	function riskes_delete($id_risk){
		global $wpdb;
		$table = $wpdb->prefix . 'pineal_risk';
		$t = "DELETE FROM $table WHERE id_risk='%d'";
		$query = $wpdb->prepare($t, $id_risk);
		return $wpdb->query($query);
	}

