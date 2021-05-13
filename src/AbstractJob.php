<?php
declare( strict_types=1 );

namespace Automattic\WooCommerce\ActionSchedulerJobFramework;

use WC_Queue_Interface;

defined( 'ABSPATH' ) || exit;

/**
 * AbstractJob class.
 *
 * Abstract class for jobs that use ActionScheduler.
 *
 * @since 1.0.0
 */
abstract class AbstractJob implements JobInterface {

	/**
	 * @var WC_Queue_Interface
	 */
	protected $queue;

	/**
	 * AbstractJob constructor.
	 *
	 * @param WC_Queue_Interface $queue
	 */
	public function __construct( WC_Queue_Interface $queue ) {
		$this->queue = $queue;
	}

	/**
	 * Get the base name for the job's scheduled actions.
	 *
	 * @return string
	 */
	protected function get_action_basename(): string {
		return "{$this->get_plugin_name()}/jobs/{$this->get_name()}/";
	}

	/**
	 * Get a job action's full name.
	 *
	 * @param string $short_name The name of the action without the basename.
	 *
	 * @return string The full hook name with the basename prepended.
	 */
	protected function get_action_full_name( string $short_name ): string {
		return $this->get_action_basename() . $short_name;
	}

	/**
	 * Schedule an immediate action for the job.
	 *
	 * @param string $action_short_name
	 * @param array  $args
	 */
	protected function schedule_immediate_action( string $action_short_name, array $args ) {
		$this->queue->add(
			$this->get_action_full_name( $action_short_name ),
			$args,
			$this->get_group_name()
		);
	}

	/**
	 * Get the action group name/slug for the job.
	 *
	 * @return string
	 */
	public function get_group_name(): string {
		return '';
	}

}
