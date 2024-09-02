<?php

 
require_once(dirname(__FILE__) . '/../../../../framework/test/CDbTestCase.php');

class EventTest extends CDbTestCase
{
    protected $fixtures=array( 
        'event'=>'Event',
    );
    
    public function testApprove() {
        // insert a comment in pending status
        $event=new Event;
        $event->setAttributes(array(
            'author'=>'Author 2',
            'details'=>'Pop Event Lipezker Str. 18',
            'event_date'=>date('Y-m-d'),
            'event_time'=>time(),
            'name'=>'jacob@example.com',
            'status'=>0,
        ),false);
        $this->assertTrue($event->save(false));
    
        // verify the comment is in pending status
        $event=Event::model()->findByPk($event->id);
        $this->assertTrue($event instanceof Event);
        $this->assertEquals(0,$event->status); 
    }
     
}