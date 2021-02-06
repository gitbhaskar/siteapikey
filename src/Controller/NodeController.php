<?php
/**
 * @file
 * Contains \Drupal\siteapikey\Controller.
 */
 
namespace Drupal\siteapikey\Controller;

use Drupal\Core\Controller\ControllerBase;
use \Drupal\node\NodeInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * @class
 * Extending class controller geting json response.
 */ 
class NodeController extends ControllerBase {
	public function nodeExport($type, NodeInterface $node) {
		// get the id from the controller argument
		$node_id = $node->id();
		$nodedata = \Drupal::entityManager()->getStorage('node')->load($node_id);	  
		$response_array = [];
		if($nodedata) {
		   $response_array[] = [
			'title' => htmlspecialchars($nodedata->title->value),
			'body' => htmlspecialchars($nodedata->body->value),             
		   ]; 
		 }
		return new JsonResponse($response_array);
	}
}
?>