<?php
class IgnoredActionsThrowTest extends PHPUnit_Framework_TestCase
{
	/**
	 * @dataProvider      ignoredIssueActionProvider
	 * @expectedException GitHubIgnoredEventException
	 */
	public function testIssueThrow( $Action )
	{
		$Parser = new GitHub_IRC( 'issues', (object)[ 'action' => $Action ] );
		$Parser->GetMessage();
	}
	
	/**
	 * @dataProvider      ignoredPullRequestActionProvider
	 * @expectedException GitHubIgnoredEventException
	 */
	public function testPullRequestThrow( $Action )
	{
		$Parser = new GitHub_IRC( 'pull_request', (object)[ 'action' => $Action ] );
		$Parser->GetMessage();
	}
	
	/**
	 * @dataProvider      ignoredMilestoneActionProvider
	 * @expectedException GitHubIgnoredEventException
	 */
	public function testMilestoneThrow( $Action )
	{
		$Parser = new GitHub_IRC( 'milestone', (object)[ 'action' => $Action ] );
		$Parser->GetMessage();
	}
	
	public function ignoredIssueActionProvider( )
	{
		return [
			[ 'labeled' ],
			[ 'unlabeled' ],
			[ 'assigned' ],
			[ 'unassigned' ],
		];
	}
	
	public function ignoredPullRequestActionProvider( )
	{
		return [
			[ 'synchronize' ],
			[ 'labeled' ],
			[ 'unlabeled' ],
			[ 'assigned' ],
			[ 'unassigned' ],
			[ 'review_requested' ],
			[ 'review_request_removed' ],
		];
	}
	
	public function ignoredMilestoneActionProvider( )
	{
		return [
			[ 'edited' ],
		];
	}
}
