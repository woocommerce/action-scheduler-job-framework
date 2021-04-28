<?php
declare( strict_types=1 );

namespace Automattic\WooCommerce\ActionSchedulerJobFramework;

use Exception;

defined( 'ABSPATH' ) || exit;

/**
 * Interface ChainedJobInterface.
 *
 * A "chained job" is a kind of batched job that creates follow-up actions until all items in the job have been processed.
 *
 * @since 1.0.0
 */
interface ChainedJobInterface extends JobInterface {

	/**
	 * Queue the job to be started in the background.
	 *
	 * @param array $args Set args to be available during the job.
	 */
	public function queue_start( array $args = [] );

	/**
	 * Handles job start action.
	 *
	 * @hooked {plugin_name}/jobs/{job_name}/start_chain
	 *
	 * @param array $args The args for the job.
	 *
	 * @throws Exception If an error occurs. Exceptions will be logged by Action Scheduler.
	 */
	public function handle_start( array $args );

	/**
	 * Handles process item action.
	 *
	 * @hooked {plugin_name}/jobs/{job_name}/process_item
	 *
	 * @param array $args The args for the job.
	 *
	 * @throws Exception If an error occurs. Exceptions will be logged by Action Scheduler.
	 */
	public function handle_item( array $args );

	/**
	 * Handles job end action.
	 *
	 * @hooked {plugin_name}/jobs/{job_name}/end_chain
	 *
	 * @param array $args The args for the job.
	 *
	 * @throws Exception If an error occurs. Exceptions will be logged by Action Scheduler.
	 */
	public function handle_end( array $args );

}
