<?php
if (!defined('ABSPATH')) exit;
class ActionScheduler_NullAction extends ActionScheduler_Action {
 public function __construct( $hook = '', array $args = array(), ?ActionScheduler_Schedule $schedule = null ) {
 $this->set_schedule( new ActionScheduler_NullSchedule() );
 }
 public function execute() {
 // don't execute.
 }
}
