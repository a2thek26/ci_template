<?php
// must be within the CodeIgniter application
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Model override
 *
 * CodeIgniter Model Override File
 *
 * @category  eim
 * @package   Model
 * @author    Mickey Freeman <mickey.freeman@eimchicago.com>
 * @copyright (c) 2013, envisionit media (http://www.envisionitmedia.com)
 * @version   1.0.0
 */

/**
 * MY_Model
 *
 * Extensible object as CodeIgniter Model Override 
 * 
 * @category  eim
 * @package   Model
 * @author    Mickey Freeman <mickey.freeman@eimchicago.com>
 * @copyright (c) 2013, envisionit media (http://www.envisionitmedia.com)
 * @version   1.0.0
 */
class MY_Model extends CI_Model 
{
  /**
   * Used to contain the objects database fields
   *
   * @var array
   */
  protected $_fields;

  /**
   * Used to store the objects data
   *
   * @var array
   */
  protected $_values;

  /**
   * Used to identify the database table for the object
   *
   * @var string
   */
  protected $_tableName;

  /**
   * used to hold the primary key field for the object
   *
   * @var string
   */
  protected $_keyField;

  /**
   * used to hold the primary value for the object
   *
   * @var mixed
   */
  protected $_keyValue;

  /**
   * Property used to house the name of the object's sort ordinal
   * field, if any.
   *
   * @var string
   */
  protected $_ordinalField;

  /**
   * Loads default values for object
   *
   * @param array $keys
   * @param string $tableName
   * @param string $keyField
   */
  public function __construct($fields = array(), $tableName = null, $keyField = null, $ordinalField = null)
  {
    $this->_fields       = $fields;
    $this->_tableName    = $tableName;
    $this->_keyField     = $keyField;
    $this->_keyValue     = '';
    $this->_ordinalField = $ordinalField;

    foreach ($this->_fields as $field) {
      $this->_values[$field] = '';
    } // end foreach field

    parent::__construct();
  } // end constructor function

  /**
   * Retrieves current object field definition array
   *
   * @return array
   */
  public function getFields()
  {
    return $this->_fields;
  } // end function getFields

  /**
   * Returns only the specified field from the value array
   *
   * @param string $field
   * @return string
   */
  public function getValue($field)
  {
    return $this->_values[$field];
  } // end function getValue

  /**
   * Retrieves current object field values associative array
   *
   * @return array
   */
  public function getValues()
  {
    return $this->_values;
  } // end function getValues

  /**
   * returns current object key field
   *
   * @return string
   */
  public function getKeyField()
  {
    return $this->_keyField;
  } // end function getKeyField

  /**
   * returns current object key field value
   *
   * @return mixed
   */
  public function getKeyValue()
  {
    return $this->_keyValue;
  } // end function getKeyValue

  /**
   * Sets the specified value as the objects primary key value
   *
   * @param string $value
   */
  public function setKeyValue($value)
  {
    $this->_keyValue = $value;
    $this->_values[$this->_keyField] = $value;
  } // end function setKeyValue

  /**
   * Sets the specified value in the specified field in the object
   *
   * @param string $field
   * @param string $value
   */
  public function setValue($field, $value)
  {
    $this->_values[$field] = $value;
  } // end function setValue

  /**
   * Loads the object with the specified values, only values specified in the
   * fields array will be added to the object.
   *
   * @param array $values
   */
  public function setValues(array $values)
  {
    foreach ($this->_fields as $field) {
      if (isset($values[$field])) {
        $this->_values[$field] = $values[$field];
      } // end if value is set 
    } // end foreach field
  } // end function setValues

  /**
   * Adds additional values on to the object's value array, useful for tacking on
   * extra fields which may not be a part of the object.
   *
   * @param array $values
   */
  public function appendValues(array $values)
  {
    foreach ($values as $field => $value) {
      $this->_values[$field] = $value;
    }
  } // end function appendValues

  /**
   * Loads object values for the specified key field, returns
   * true if the record is found, false otherwise.
   *
   * @param mixed $id
   * @return bool
   */
  public function loadFromDb($keyValue)
  {
    if ($keyValue != '0' && $keyValue != '') {
      $sql = "SELECT " . implode(',', $this->_fields) . " FROM " . $this->_tableName . " "
           . "WHERE " . $this->_keyField . " = '$keyValue' LIMIT 0,1 ";
      
      $result = $this->db->query($sql);

      if ($result->num_rows() > 0) {
        $this->_values = $result->row_array();
        $this->_keyValue = $keyValue;
        return true;
      } else {
        return false;
      } // end if rows
    } else {
      return false;
    } // end if id
  } // end function loadFromDb

  /**
   * Searches the request array for object data and stores it in the object
   * regardless of whether it is found or not. If data is found the function
   * will return true, otherwise it will return false.
   *
   * @return bool
   */
  public function loadFromQuery()
  {
    $foundData = false;

    if (isset($_REQUEST[$this->_keyField])) { 
      $this->_keyValue = $_REQUEST[$this->_keyField];
    } // end if 

    if ($this->_keyValue != '') {
      $foundData = true;
    } // end if keyvalue not null

    foreach ($this->_fields as $field) {
      if (isset($_REQUEST[$field])) {
        $this->_values[$field] = $_REQUEST[$field];
      } // end if 

      if ($this->_values[$field] != '') {
          $foundData = true;
      } // end if field not null
    } // end foreach key

    return $foundData;
  } // end function loadFromQuery

  /**
   * Assumes that the object has already been loaded, searches through the request
   * array for object data and stores it in the object only if it is found.
   * If data is found then the function returns true, otherwise false.
   *
   * @return bool
   */
  public function updateFromQuery()
  {
    $modifiedData = false;

    if ($this->_keyValue == '') {
      if (isset($_REQUEST[$this->_keyField])) {
        $this->_keyValue = $_REQUEST[$this->_keyField];
        $modifiedData = true;
      } // end if issset key field
    } // end if key value is null

    foreach ($this->_fields as $field) {
      if (isset($_REQUEST[$field])) {
        $this->_values[$field] = $_REQUEST[$field];
        $modifiedData = true;
      } // end if isset field
    } // end foreach key

    return $modifiedData;
  } // end function updateFromQuery

  /**
   * Removes specified record from the database
   *
   * @param unknown_type $id
   */
  public function delete($keyValue)
  {
    $sql = "DELETE FROM " . $this->_tableName . " WHERE " . $this->_keyField . "= '$keyValue'";
    
    $this->db->query($sql);

  } // end function delete

  /**
   * Checks Key Field value to determine if record should be inserted
   * or updated into the database.
   */
  public function save()
  {
    if ($this->_keyValue != null) {
      $this->_update();
    } else {
      $this->_insert();
    } // end if key value
  } // end function save

  /**
   * Escapes data contained with the object before updating an existing record
   * within the database, contained data is unescaped before exiting
   *
   */
  protected function _update()
  {
    $this->_escapeData();

    $sql = "UPDATE " . $this->_tableName . " SET ";

    foreach ($this->_fields as $field) {
      if ($field != $this->_keyField) {
        $sql .= $field . " = ";

        if ($this->_values[$field] == null) {
          $sql .= "NULL, ";
        } elseif ($this->_values[$field] == 'CURRENT_TIMESTAMP') {
          $sql .= $this->_values[$field] . ", ";
        } else {
          $sql .= "'" . $this->_values[$field] . "', ";
        } // end if null
      } // end if not key field.
    } // end foreach key

    $sql = substr($sql, 0, -2) . " "; // remove the trailing comma
    $sql .= "WHERE " . $this->_keyField . " = '" . $this->_keyValue . "' ";

    $this->db->query($sql);

    $this->_unescapeData();
  } // end function update

  /**
   * Escapes data contained within the object and inserts it into the
   * database. Inserted record ID is stored within the object and
   * data is unescaped after insertion
   *
   */
  protected function _insert()
  {
    $this->_escapeData();

    $sql = "INSERT INTO " . $this->_tableName . " ( " . implode(', ', $this->_fields) . ") VALUES (";

    foreach ($this->_fields as $field) {
      if ($this->_values[$field] === null) {
        $sql .= "NULL, ";
      } elseif ($this->_values[$field] == 'CURRENT_TIMESTAMP') {
        $sql .= $this->_values[$field] . ", ";
      } else {
        $sql .= "'" . $this->_values[$field] . "', ";
      } // end if null
    } // end foreach field

    $sql = substr($sql, 0, -2) . ")";

    $this->db->query($sql);

    $this->_keyValue = $this->db->insert_id();

    $this->_unescapeData();
  } // end function insert

  /**
   * Escapes data contained within the object to protect the database
   *
   */
  protected function _escapeData()
  {
    foreach ($this->_fields as $field) {
      if (!is_null($this->_values[$field])) {
        $this->_values[$field] = addslashes(stripslashes($this->_values[$field]));
      } // end if not null
    } // end foreach key
  } // end function escapeData

  /**
   * Strips slashes from data within the object to return it to a
   * readable format.
   *
   */
  protected function _unescapeData()
  {
    foreach ($this->_fields as $field) {
      if (!is_null($this->_values[$field])) {
        $this->_values[$field] = stripslashes($this->_values[$field]);
      } // end if not null
    } // end foreach key
  } // end function unescapeData

  /**
   * Removes and extra values tacked onto the object which are not part
   * of the object
   *
   */
  public function cleanObject()
  {
    $holdArray = $this->_values;

    $this->_values = '';

    foreach ($this->_fields as $field) {
      $this->_values[$field] = $holdArray[$field];
    } // end foreach key
  } // end function clean object

  /**
   * Stores the data contained within the object to the session under the
   * specified namespace
   *
   * @param string $nameSpace
   */
  public function sessionStore($nameSpace)
  {
    $_SESSION[$nameSpace][$this->_keyField] = $this->_keyValue;

    foreach ($this->_fields as $field) {
      $_SESSION[$nameSpace][$field] = $this->_values[$field];
    } // end foreach key
  } // end function session store

  /**
   * Retrieves stored data and contains it within the object
   *
   * @param unknown_type $nameSpace
   */
  public function sessionRetrieve($nameSpace)
  {
    $this->_keyValue = $_SESSION[$nameSpace][$this->_keyField];

    foreach ($this->fields as $field) {
      $this->_values[$field] = $_SESSION[$nameSpace][$field];
    } // end foreach key

    unset($_SESSION[$nameSpace]);
  } // end function session retrieve

  /**
   * Reorders object records in the database using a base 10 multiple system for the
   * object's specified ordinalField. Use the $keyField and $keyValue parameters for
   * foriegn keys or sub types
   *
   * @param string $keyField
   * @param int $keyValue
   */
  public function reorder($keyField = null, $keyValue = null)
  {
    $sql = "SELECT * FROM " . $this->_tableName . " ";

    if ($keyField != null && $keyValue != null) {
      $sql .= "WHERE $keyField = '$keyValue' ";
    } // end if keyfield and value

    $sql .= "ORDER BY " . $this->_ordinalField . " ASC ";

    $result = $this->db->query($sql);

    $counter = 1;
    $increment = 10;

    while ($row = $result->row_array()) {
      $ordinal = $counter * $increment;

      $updateSql = "UPDATE " . $this->_tableName . " SET " . $this->_ordinalField . " = '$ordinal' "
                 . "WHERE " . $this->_keyField . " = '" . $row[$this->_keyField] . "' ";

      $updateResult = $this->db->query($updateSql);

      $counter++;
    } // end while row
  } // end function reorder

  /**
   * Extensible function used to retrieve the next highest ordinal
   * field value from the database for the object. Use the $keyField and $keyValue
   * parameters for forgien keys or sub types.
   *
   * @param string $keyField
   * @param int $keyValue
   * @return int
   */
  protected function _getHighOrdinal($keyField = null, $keyValue = null)
  {
    $sql = "SELECT MAX(" . $this->_ordinalField . ") as high_ordinal FROM " . $this->_tableName . " ";

    if ($keyField != null && $keyValue != null) {
      $sql .= "WHERE $keyField = '$keyValue' ";
    } // end if keyfield

    $result = $this->db->query($sql);

    $highOrdinal = $result->row()->high_ordinal;

    if ($highOrdinal == null || $highOrdinal == 0) {
      return 10;
    } else {
      return $highOrdinal + 10;
    } // end if highOrdial
  } // end function _getHighOrdinal
} // end class Eim_Object
