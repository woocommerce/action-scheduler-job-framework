<?php
declare( strict_types=1 );

namespace Automattic\WooCommerce\ActionSchedulerJobFramework;

/**
 * Class ScheduledActionStatus
 *
 * @since 1.1.0
 */
class ScheduledActionStatus {
	const COMPLETE = 'complete';
	const PENDING  = 'pending';
	const RUNNING  = 'in-progress';
	const FAILED   = 'failed';
	const CANCELED = 'canceled';
}
