<?php namespace App\Build\Pages\Repositories\Contracts;

interface PageRepositoryContract
{
	public function getPages(array $select = ['*'], array $order = ['id', 'DESC'], array $pagination = []);

	public function createPage(array $attributes = []);

	public function updatePage($id, array $attributes = []);

	public function destroy($id);

	public function findPageId($id, array $select = ['*']);
}
