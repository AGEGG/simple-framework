<?php
namespace sf\db;
use PDO;
/**
 * Model is the base class for data models.
 */
class Model implements ModelInterface
{
    /**
     * @var $pdo PDO instance
     */
    public static $pdo;
    /**
     * Get pdo instance
     * @return PDO
     */
    public static function getDb()
    {
        if (empty(static::$pdo)) {
            $host = 'localhost';
            $database = 'sf';
            $username = 'root';
            $password = 'root';
            static::$pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);
            static::$pdo->exec("set names 'utf8'");
        }
        return static::$pdo;
    }
    /**
     * Declares the name of the database table associated with this Model class.
     * @return string the table name
     */
    public static function tableName()
    {
        return get_called_class();
    }
    /**
     * Returns the primary key **name(s)** for this Model class.
     * @return string[] the primary key name(s) for this Model class.
     */
    public static function primaryKey()
    {
        return ['id'];
    }
    /**
     * Returns a single model instance by a primary key or an array of column values.
     *
     * ```php
     * // find the first customer whose age is 30 and whose status is 1
     * $customer = Customer::findOne(['age' => 30, 'status' => 1]);
     * ```
     *
     * @param mixed $condition a set of column values
     * @return static|null Model instance matching the condition, or null if nothing matches.
     */
    public static function findOne($condition)
    {
        $sql = 'select * from ' . static::tableName() . ' where ';
        $params = array_values($condition);
        $keys = [];
        foreach ($condition as $key => $value) {
            array_push($keys, "$key = ?");
        }
        $sql .= implode(' and ', $keys);
        $stmt = static::getDb()->prepare($sql);
        $rs = $stmt->execute($params);
        if ($rs) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if (!empty($row)) {
                $model = new static();
                foreach ($row as $rowKey => $rowValue) {
                    $model->$rowKey = $rowValue;
                }
                return $model;
            }
        }
        return null;
    }
    /**
     * Returns a list of models that match the specified primary key value(s) or a set of column values.
     *
     *  ```php
     * // find customers whose age is 30 and whose status is 1
     * $customers = Customer::findAll(['age' => 30, 'status' => 1]);
     * ```
     *
     * @param mixed $condition a set of column values
     * @return array an array of Model instance, or an empty array if nothing matches.
     */
    public static function findAll($condition)
    {
    }
    /**
     * Updates models using the provided attribute values and conditions.
     * For example, to change the status to be 2 for all customers whose status is 1:
     *
     * ~~~
     * Customer::updateAll(['status' => 1], ['status' => '2']);
     * ~~~
     *
     * @param array $attributes attribute values (name-value pairs) to be saved for the model.
     * @param array $condition the condition that matches the models that should get updated.
     * An empty condition will match all models.
     * @return integer the number of rows updated
     */
    public static function updateAll($condition, $attributes)
    {
    }
    /**
     * Deletes models using the provided conditions.
     * WARNING: If you do not specify any condition, this method will delete ALL rows in the table.
     *
     * For example, to delete all customers whose status is 3:
     *
     * ~~~
     * Customer::deleteAll([status = 3]);
     * ~~~
     *
     * @param array $condition the condition that matches the models that should get deleted.
     * An empty condition will match all models.
     * @return integer the number of rows deleted
     */
    public static function deleteAll($condition)
    {
    }
    /**
     * Inserts the model into the database using the attribute values of this record.
     *
     * Usage example:
     *
     * ```php
     * $customer = new Customer;
     * $customer->name = $name;
     * $customer->email = $email;
     * $customer->insert();
     * ```
     *
     * @return boolean whether the model is inserted successfully.
     */
    public function insert()
    {
    }
    /**
     * Saves the changes to this model into the database.
     *
     * Usage example:
     *
     * ```php
     * $customer = Customer::findOne(['id' => $id]);
     * $customer->name = $name;
     * $customer->email = $email;
     * $customer->update();
     * ```
     *
     * @return integer|boolean the number of rows affected.
     * Note that it is possible that the number of rows affected is 0, even though the
     * update execution is successful.
     */
    public function update()
    {
    }
    /**
     * Deletes the model from the database.
     *
     * @return integer|boolean the number of rows deleted.
     * Note that it is possible that the number of rows deleted is 0, even though the deletion execution is successful.
     */
    public function delete()
    {
    }
}