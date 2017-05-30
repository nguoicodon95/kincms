<?php namespace App\Build\Base\Repositories\Contracts;

interface AbstractBaseRepositoryContract
{
	/**
	 ** Return all element of the resource 
	 ** @param $select, $orderField, $orderType
	 ** @return collecttions
	 */
	public function get(array $select = ['*']);

	/**
	 * Pagination 
	 */
	public function paginate($perPage = null, $select = ['*'], $pageName = 'page', $page = null);

	/**
	 * Ordering
	 */
	public function order(array $order = ['id', 'DESC']);

	/**
	 * where
	 */
	public function where(array $value = []);

	/**
	 ** Create a resource
	 ** @param array $attributes
	 ** @return mixed 
	 */	
	public function create( array $attributes );

	/**
	 ** Update a resource
	 ** @param $id, array $attributes
	 ** @return mixed 
	 */	
	public function update( $id, array $attributes );

	/**
	 ** Find a resource
	 ** @param int $id, $select
	 ** @return collecttion
	 */
	public function findById($id, array $select = ['*']);
	
	/**
	 ** Find a resource by the given slug
	 ** @param string $slug
	 ** @return collecttion
	 */
	public function findBySlug($slug, array $select = ['*']);

	/**
	 ** Delete a resource 
	 ** @param $id
	 ** @return collecttion
	 */
	public function destroy($id);
	
}
