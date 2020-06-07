<?php

require_once __DIR__ . '/../app/database/db.class.php';
require_once __DIR__ . '/user.class.php';
require_once __DIR__ . '/utakmice.class.php';
require_once __DIR__ . '/tiket.class.php';
//require_once __DIR__ . '/sveostaleklasedodatiovako.class.php';

class KladionicaService
{
	function getUserById( $id )
	{
		try
		{
			$db = DB::getConnection();
			$st = $db->prepare( 'SELECT * FROM Kladionica_Users WHERE id=:id' );
			$st->execute( array( 'id' => $id ) );
		}
		catch( PDOException $e ) { exit( 'PDO error ' . $e->getMessage() ); }

		$row = $st->fetch();
		
		if( $row === false )
			return null;
		else
			return new User( $row['id'], $row['username'], $row['password_hash'], $row['email']);
	}
	function getUserByUsername( $username )
	{
		try
		{
			$db = DB::getConnection();
			$st = $db->prepare( 'SELECT * FROM Kladionica_Users WHERE username=:username' );
			$st->execute( array( 'username' => $username ) );
		}
		catch( PDOException $e ) { exit( 'PDO error ' . $e->getMessage() ); }

		$row = $st->fetch();
		
		if( $row === false )
			return null;
		else
			return new User( $row['id'], $row['username'], $row['password_hash'], $row['email']);
	}

	function getAllUsers( )
	{
		try
		{
			$db = DB::getConnection();
			$st = $db->prepare( 'SELECT * FROM Kladionica_Users ORDER BY username' );
			$st->execute();
		}
		catch( PDOException $e ) { exit( 'PDO error ' . $e->getMessage() ); }

		$arr = array();
		while( $row = $st->fetch() )
		{
			$arr[] = new User( $row['id'], $row['username'], $row['password_hash'], $row['email'] );
		}

		return $arr;
	}
	function dohvatiUtakmice()
	{
		try
		{
			$db = DB::getConnection();
			$st = $db->prepare( 'SELECT * FROM Kladionica_Utakmice ORDER BY sport' );
			$st->execute();
		}
		catch( PDOException $e ) { exit( 'PDO error ' . $e->getMessage() ); }

		$arr = array();
		while( $row = $st->fetch() )
		{
			$arr[] = new Utakmica( $row['id'], $row['domaci'], $row['gosti'], $row['kvota1'], 
					$row['kvotaX'], $row['kvota2'], $row['kvota1x'], $row['kvota2x'] );
		}

		return $arr;
	}
	function dohvatiSportove()
	{
		try
		{
			$db = DB::getConnection();
			$st = $db->prepare( 'SELECT DISTINCT sport FROM Kladionica_Utakmice ORDER BY sport' );
			$st->execute();
		}
		catch( PDOException $e ) { exit( 'PDO error ' . $e->getMessage() ); }

		$arr = array();
		while( $row = $st->fetch() )
		{
			array_push($arr, $row['sport']);
		}
		return $arr;
	}
	function dohvatiUtakmiceSporta($sport)
	{
		
		try
		{
			$db = DB::getConnection();
			$st = $db->prepare( 'SELECT * FROM Kladionica_Utakmice WHERE sport="'. $sport . '"');
			$st->execute();
		}
		catch( PDOException $e ) { exit( 'PDO error ' . $e->getMessage() ); }
		$arr = array();
		while( $row = $st->fetch() )
		{
			$arr[] = new Utakmica( $row['id'], $row['domaci'], $row['gosti'], $row['kvota1'], 
					$row['kvotaX'], $row['kvota2'], $row['kvota1x'], $row['kvota2x'] );
		}
		return $arr;
		
	}
};

?>

