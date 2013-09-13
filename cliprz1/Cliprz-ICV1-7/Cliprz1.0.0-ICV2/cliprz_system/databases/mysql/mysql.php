<?php

/**
 * Copyright :
 *  Cliprz model view controller framework.
 *  Copyright (C) 2012 - 2013 By Yousef Ismaeil.
 *
 * Framework information :
 *  Version 1.0.0 - Incomplete version for real use 2.
 *  Official website http://www.cliprz.org .
 *
 * File information :
 *  File path BASE_PATH/cliprz_system/databases/drivers/mysql/.
 *  File name mysql.php .
 *  Created date 18/11/2012 12:42 AM.
 *  Last modification date 18/11/2012 08:26 AM.
 *
 * Description :
 *  Mysql database class.
 *
 * Licenses :
 *  This program is released as free software under the Affero GPL license. You can redistribute it and/or
 *  modify it under the terms of this license which you can read by viewing the included agpl.txt or online
 *  at www.gnu.org/licenses/agpl.html. Removal of this copyright header is strictly prohibited without
 *  written permission from the original author(s).
 */

if (!defined("IN_CLIPRZ")) die('Access Denied');

class mysql
{

    /**
     * @var (resource) $connection - The MySQL connection.
     * @access protected.
     */
    protected static $connection;

    /**
     * @var (string) $prefix - Database prefix.
     * @access protected.
     */
    protected static $prefix;

    /**
     * Mysql constructor.
     *
     * @access public.
     */
    public function __construct()
    {
        global $_config;
        self::$prefix = $_config['db']['prefix'];
    }

    /**
     * Opens or reuses a connection to a MySQL server.
     *
     * @param (string) $database_host - The MySQL server. It can also include a port number. e.g. "hostname:port" or a path to a local socket e.g. ":/path/to/socket" for the localhost.
     * @param (string) $database_username - Database username.
     * @param (string) $database_password - Database password.
     * @access public.
     */
    public static function connect ($database_host,$database_username,$database_password)
    {
        self::$connection = @mysql_connect($database_host,$database_username,$database_password);

        if (!self::$connection)
        {
            cliprz::system(error)->database(array(
                "title"   => "MySQL error",
                "content" => "Could not connect to the database."));
        }
    }

    /**
     * Open a persistent connection to a MySQL server.
     *
     * @param (string) $database_host - The MySQL server. It can also include a port number. e.g. "hostname:port" or a path to a local socket e.g. ":/path/to/socket" for the localhost.
     * @param (string) $database_username - Database username.
     * @param (string) $database_password - Database password.
     * @access public.
     */
    public static function pconnect ($database_host,$database_username,$database_password)
    {
        self::$connection = @mysql_pconnect($database_host,$database_username,$database_password);

        if (!self::$connection)
        {
            cliprz::system(error)->database(array(
                "title"   => "MySQL error",
                "content" => "Could not connect to the database."));
        }
    }

    /**
     * Select a MySQL database.
     *
     * @param (string) $database_name - The name of the database that is to be selected..
     * @access public.
     */
    public static function select_db($database_name)
    {
        $select_database = @mysql_select_db($database_name,self::$connection);

        if (!$select_database)
        {
            cliprz::system(error)->database(array(
                "title"   => "MySQL error",
                "content" => $database_name." Not exists in database."));
        }
    }

    /**
     * Send a MySQL query.
     *
     * @param (string) $sql - An SQL query.
     * @access public.
     */
    public static function query ($sql)
    {
        $query = mysql_query($sql);

        if (!$query)
        {
            cliprz::system(error)->database(array(
                "title"   => "MySQL error ".mysql_errno(),
                "content" => mysql_error()));
        }
        else
        {
            return $query;
        }
    }

    /**
     * Selection from the database tables.
     *
     * @param (string) $table - table name in database.
     * @param (string) $fields - fields name.
     * @param (string) $where - where SQL.
     * @param (string) $orderby - ORDER BY SQL.
     * @param (string) $limit - LIMIT SQL.
     * @access public.
     */
    public static function select($table,$fields='*',$where='',$orderby='',$limit='')
    {
        $query = "SELECT ".$fields." FROM ".self::$prefix."".$table."";

        if ($where != '')
        {
            $query .= " WHERE ".$where." ";
        }

        if ($orderby != '')
        {
            $query .= " ORDER BY ".$orderby." ";
        }

        if ($limit != '')
        {
            $query .= " LIMIT ".$limit."";
        }

        $select = self::query($query);
        return $select;
    }

    /**
     * Insert data into MySQL database.
     *
     * @param (string) $table - table name in database.
     * @param (array) $array -post variables with Keys.
     * @access public.
     */
    public static function insert($table,$array)
    {
        // Check array
		if(!is_array($array))
        {
            return false;
        }

        // Impload array keys from the the array
        $fields = "`".implode("`,`", array_keys($array))."`";

        // Impload array as variables
        $values = implode("','",$array);

        // Query
        $insert = self::query("INSERT INTO ".self::$prefix."".$table." (".$fields.") VALUES ('".$values."')");

        return $insert;
    }

    /**
     * Update mysql database data.
     *
     * @param (string) $table - table name in database.
     * @param (array) $array - Array with Keys.
     * @param (string) $where -  Where $_GET.
     * @param (string) $limit - Limit.
     * @param (boolean) $no_quote - Quote default is false (true or false).
     * @access public.
     */
    public static function update($table, $array, $where="", $limit="", $no_quote=false)
    {
        // Check array
		if(!is_array($array))
        {
            return false;
        }

		$comma = "";
		$query = "";
		$quote = "'";

		if($no_quote == true)
        {
            $quote = "";
        }

		foreach($array as $field => $value)
		{
			$query .= $comma."`".$field."`=".$quote."".$value."".$quote."";
			$comma = ', ';
		}

		if(!empty($where))
        {
            $query .= " WHERE $where";
        }

		if(!empty($limit))
        {
            $query .= " LIMIT $limit";
        }

        $update = self::query("UPDATE ".self::$prefix."".$table." SET ".$query."");
        return $update;
    }

    /**
     * Update data from MySQL database where Specific SQL requested.
     *
     * @param (string) $table - table name in database.
     * @param (string) $fields - field names.
     * @param (string) $where - where id = $_GET['id'];.
     * @access public.
     */
    public static function update_where($table,$fields,$where)
    {
        $update_where = self::query("UPDATE ".self::$prefix."".$table." SET ".$fields." WHERE ".$where."");
        return $update_where;
    }

    /**
     * Delete data from MySQL database where Specific SQL requested.
     *
     * @param (string) $table - table name in database.
     * @param (string) $field_name - field name.
     * @param (string) $where - Where value.
     * @access public.
     */
    public static function delete($table,$field_name,$where)
    {
        $delete = self::query("DELETE FROM ".self::$prefix."".$table." WHERE ".$field_name."='".$where."'");
        return $delete;
    }

    /**
     * Escapes special characters in a string for use in an SQL statement.
     *
     * @param (string) $str - The string that is to be escaped.
     * @access public.
     */
    public static function real_escape_string($str)
    {
        if (function_exists('mysql_real_escape_string'))
        {
            $escape = trim(mysql_real_escape_string($str));
            return $escape;
        }
        else
        {
            $search  = array("\\","\0","\n","\r","\x1a","'",'"');
            $replace = array("\\\\","\\0","\\n","\\r","\Z","\'",'\"');
            $escape  = trim(str_replace($search,$replace,$str));
            return $escape;
        }
    }

    /**
     * Fetch a result row as an associative array.
     * Returns an associative array that corresponds to the fetched row and moves the internal data pointer ahead.
     *
     * @param (resource) $results - result.
     * @access public.
     */
    public static function fetch_assoc($results)
    {
        $fetch_assoc = mysql_fetch_assoc($results);
        return $fetch_assoc;
    }

    /**
     * Fetch a result row as an associative array, a numeric array, or both.
     * Returns an array that corresponds to the fetched row and moves the internal data pointer ahead.
     *
     * @param (resource) $results - result.
     * @access public.
     */
    public static function fetch_array($results)
    {
        $fetch_array = mysql_fetch_array($results);
        return $fetch_array;
    }

    /**
     * Fetch a result row as an object.
     * Returns an object with properties that correspond to the fetched row and moves the internal data pointer ahead.
     *
     * @param (resource) $results - result.
     * @access public.
     */
    public static function fetch_object($results)
    {
        $fetch_object = mysql_fetch_object($results);
        return $fetch_object;
    }

    /**
     * Free result memory.
     * will free all memory associated with the result identifier result.
     *
     * @param (resource) $query - result.
     * @access public.
     */
    public static function free_result($query)
    {
        $free_result = mysql_free_result($query);
        return $free_result;
    }

    /**
     * Get number of rows in result.
     *
     * @param (resource) $query - result.
     * @access public.
     */
    public static function num_rows($query)
    {
        $num_rows = mysql_num_rows($query);
        return $num_rows;
    }

    public static function affected_rows()
    {
        return mysql_affected_rows(self::$connection);
    }

    /**
     * Sets the default character set for the current connection.
     *
     * @access public.
     */
    public static function set_charset ()
    {
        global $_config;

        if(function_exists('mysql_set_charset'))
        {
            mysql_set_charset($_config['db']['charset']);
        }
        else
        {
            self::query("SET NAMES ".$_config['db']['charset']);
            // self::query("SET CHARACTER SET ".$_config['db']['charset']);
        }
    }

    /**
     * Close mysql connection.
     *
     * @access public.
     */
    public static function close ()
    {
        mysql_close(self::$connection);
    }

}

?>