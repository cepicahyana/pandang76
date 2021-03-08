<?php 
class umum
{
	public function jmlEvent()
	{
	$ci = &get_instance();
	$ci->load->model("m_umum");
	return $ci->m_umum->jmlEvent();
	}
	public function jmlInvoice()
	{
	$ci = &get_instance();
	$ci->load->model("m_umum");
	return $ci->m_umum->jmlInvoice();
	}
	public function ketPeserta($id)
	{
	$ci = &get_instance();
	$ci->load->model("m_umum");
	return $ci->m_umum->ketPeserta($id);
	}
	
	
	public function dataEvent($llink,$id)
	{
	$ci = &get_instance();
	$ci->load->model("m_umum");
	return $ci->m_umum->dataEvent($llink,$id);
	}
	public function namaEvent($id)
	{
	$ci = &get_instance();
	$ci->load->model("m_umum");
	return $ci->m_umum->namaEvent($id);
	}
	public function totalUser()
	{
	$ci = &get_instance();
	$ci->load->model("m_umum");
	return $ci->m_umum->totalUser();
	}public function totalEvent()
	{
	$ci = &get_instance();
	$ci->load->model("m_umum");
	return $ci->m_umum->totalEvent();
	}public function totalTransfer()
	{
	$ci = &get_instance();
	$ci->load->model("m_umum");
	return $ci->m_umum->totalTransfer();
	}
	public function totalPeserta()
	{
	$ci = &get_instance();
	$ci->load->model("m_umum");
	return $ci->m_umum->totalPeserta();
	}public function totalSaldo()
	{
	$ci = &get_instance();
	$ci->load->model("m_umum");
	return $ci->m_umum->totalSaldo();
	}public function totalInvoice()
	{
	$ci = &get_instance();
	$ci->load->model("m_umum");
	return $ci->m_umum->totalInvoice();
	}
	
}
