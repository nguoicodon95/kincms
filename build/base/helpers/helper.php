<?php
	if(!function_exists('converStatus')) {
		function converStatus($status)
		{
			switch ($status) {
				case 'active':
					$status_html = '<span class="label label-primary">Đã Kích hoạt</span>';
					break;
				default:
					$status_html = '<span class="label label-danger">Đã vô hiệu hóa</span>';
					break;
			}
			return $status_html;
		}
	}