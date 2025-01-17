<?php

/**
 * This is the model class for table "event".
 *
 * The followings are the available columns in table 'event':
 * @property integer $id
 * @property string $author
 * @property string $details
 * @property string $event_date
 * @property string $event_time
 * @property string $name
 * @property string $venue
 */
class Event extends CActiveRecord
{	
	protected function beforeSave()
    {
        if ($this->isNewRecord) {
            
            $this->event_date = new CDbExpression('CURDATE()'); // Current date
            $this->event_time = new CDbExpression('CURTIME()'); // Current time

            Yii::log('Event Date: ' . $this->event_date, CLogger::LEVEL_ERROR);
            Yii::log('Event Time: ' . $this->event_time, CLogger::LEVEL_ERROR);
            
        }
        return parent::beforeSave();
    }


	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'event';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('author, details, event_date, event_time, name, venue', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, author, details, event_date, event_time, name, venue', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
            'posts' => array(self::HAS_MANY, 'Posts', 'event_id'),
        );
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'author' => 'Author',
			'details' => 'Details',
			'event_date' => 'Event Date',
			'event_time' => 'Event Time',
			'name' => 'Name',
			'venue' => 'Venue',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('author',$this->author,true);
		$criteria->compare('details',$this->details,true);
		$criteria->compare('event_date',$this->event_date,true);
		$criteria->compare('event_time',$this->event_time,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('venue',$this->venue,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Event the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
