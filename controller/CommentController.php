<?php
namespace controller;
class CommentController{

	public function getAllCommentsForID($ID, $db)
	{
		return $db->getAllCommentsForID($ID);
	}
	/**
	* sends build ID, user ID and the Comment to DB-class
	*/
	public function addComment($buildId, $userId, $comment, $db)
	{
		$db->addComment($buildId, $userId, $comment);
	}
}