<?php 
class Contact extends AppModel {
    
    public $validate = array(
        'name' => array(
            'rule' => 'notBlank'
        ),
        'email' => array(
            'rule' => 'notBlank'
        ),
        'message' => array(
            'rule' => 'notBlank'
        )
    );
}
