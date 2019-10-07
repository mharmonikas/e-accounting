<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
 

class Novo extends CI_Controller {
 
function __construct()
{
        parent::__construct();
 
$this->load->database();

$this->load->helper('url');

 
$this->load->library('grocery_CRUD');
 
}
public function index()
{
	if($this->session->userdata('najaven')==false)
{
	
	$this->load->view('login');
	$this->load->view('login_info');
} else 
	redirect('novo/pocetna', 'refresh');
}
 
public function pocetna()
{ 
if($this->session->userdata('najaven')==true)
{
	
	$data_konto=array();
$data_partneri=array();
$data_nalozi=array();
$this->load->model('new_model');
if($k=$this->new_model->get_konto())
{
	$data_konto['records_k']=$k;
}
if($p=$this->new_model->get_partneri())
{
	$data_partneri['records_p']=$p;
}
if($n=$this->new_model->get_nalog())
{
	$data_nalozi['records_n']=$n;
}
$data=array_merge($data_konto,$data_nalozi,$data_partneri);
if ($this->session->userdata('tip')=="админ") $this->load->view('admin',$data);
else
$this->load->view('smetkovoditelstvo',$data);
$this->load->view('dobredojde.php');
$this->load->view('footer.php');
}
else
redirect('novo', 'refresh');
}


public function prikaz_konto()
{    
if($this->session->userdata('najaven')==true)
{
	$this->grocery_crud->set_table('stavki');
	$this->grocery_crud->where("konto=",$this->uri->segment(3));
	
	$data_konto=array();
$data_partneri=array();
$data_nalozi=array();
$this->load->model('new_model');
if($k=$this->new_model->get_konto())
{
	$data_konto['records_k']=$k;
}
if($p=$this->new_model->get_partneri())
{
	$data_partneri['records_p']=$p;
}
if($n=$this->new_model->get_nalog())
{
	$data_nalozi['records_n']=$n;
}
$data=array_merge($data_konto,$data_nalozi,$data_partneri);


$this->grocery_crud->display_as('id_nalog','Број на налог')->display_as('konto','Конто')->display_as('opis','Партнер')->display_as('datum','Датум')->display_as('dolg','Долг')->display_as('pobaruvacka','Побарувачка');

$this->load->model('new_model');
	 $pom=$this->new_model->get_konto();
     foreach ($pom as $pom ){
		 $kluc=$pom->konto;
		 $vrednost=$pom->opis;
		 $niza[$kluc]=$vrednost;
		
	 }
	
	$this->grocery_crud->field_type('konto','dropdown',$niza);
	foreach ($niza as $i => $value) {
    unset($niza[$i]);
}
	$pom=$this->new_model->get_partneri();
     foreach ($pom as $pom ){
		 $kluc=$pom->sifra;
		 $vrednost=$pom->opis;
		 $niza[$kluc]=$vrednost;
		
	 }
	
	$this->grocery_crud->field_type('opis','dropdown',$niza);
	
	foreach ($niza as $i => $value) {
    unset($niza[$i]);
}
	$pom=$this->new_model->nalog();
     foreach ($pom as $pom ){
		 $kluc=$pom->id;
		 $vrednost=$pom->broj;
		 $niza[$kluc]=$vrednost;
		
	 }
	    if(count($niza)==0){$niza[0]="Ве молиме креирајте баш налог";}
	$this->grocery_crud->field_type('id_nalog','dropdown',$niza);

	if($this->session->userdata('tip')=="корисник")
	{
		$this->grocery_crud->unset_add();
        $this->grocery_crud->unset_edit();
		$this->grocery_crud->unset_delete();
	}
					  
$output = $this->grocery_crud->render();

if ($this->session->userdata('tip')=="админ") $this->load->view('admin',$data);
else
 $this->load->view('smetkovoditelstvo.php',$data);
$this->load->view('prikaz.php',$output);   
$this->load->view('footer.php');    
	
}
else
redirect('novo','refresh');
}


public function prikaz_partner()
{    

if($this->session->userdata('najaven')==true)
{
	$this->grocery_crud->set_table('stavki');
	$this->grocery_crud->where("opis=",$this->uri->segment(3));
$data_konto=array();
$data_partneri=array();
$data_nalozi=array();
$this->load->model('new_model');
if($k=$this->new_model->get_konto())
{
	$data_konto['records_k']=$k;
}
if($p=$this->new_model->get_partneri())
{
	$data_partneri['records_p']=$p;
}
if($n=$this->new_model->get_nalog())
{
	$data_nalozi['records_n']=$n;
}
$data=array_merge($data_konto,$data_nalozi,$data_partneri);

					 
$this->grocery_crud->display_as('id_nalog','Број на налог')->display_as('konto','Конто')->display_as('opis','Партнер')->display_as('datum','Датум')->display_as('dolg','Долг')->display_as('pobaruvacka','Побарувачка');

$this->load->model('new_model');
	 $pom=$this->new_model->get_konto();
     foreach ($pom as $pom ){
		 $kluc=$pom->konto;
		 $vrednost=$pom->opis;
		 $niza[$kluc]=$vrednost;
		
	 }
	
	$this->grocery_crud->field_type('konto','dropdown',$niza);
	foreach ($niza as $i => $value) {
    unset($niza[$i]);
}
	$pom=$this->new_model->get_partneri();
     foreach ($pom as $pom ){
		 $kluc=$pom->sifra;
		 $vrednost=$pom->opis;
		 $niza[$kluc]=$vrednost;
		
	 }
	
	$this->grocery_crud->field_type('opis','dropdown',$niza);
	
	foreach ($niza as $i => $value) {
    unset($niza[$i]);
}
	$pom=$this->new_model->nalog();
     foreach ($pom as $pom ){
		 $kluc=$pom->id;
		 $vrednost=$pom->broj;
		 $niza[$kluc]=$vrednost;
		
	 }
	    if(count($niza)==0){$niza[0]="Ве молиме креирајте баш налог";}
	$this->grocery_crud->field_type('id_nalog','dropdown',$niza);

	if($this->session->userdata('tip')=="корисник")
	{
		$this->grocery_crud->unset_add();
        $this->grocery_crud->unset_edit();
		$this->grocery_crud->unset_delete();
	}
					  
$output = $this->grocery_crud->render();
if ($this->session->userdata('tip')=="админ") $this->load->view('admin',$data);
else
 $this->load->view('smetkovoditelstvo.php',$data);
 
$this->load->view('prikaz.php',$output);   
$this->load->view('footer.php');           
	
}
else
redirect('novo','refresh')	;
}


public function prikaz_nalog()
{   
if($this->session->userdata('najaven')==true)
{ 

if($this->session->userdata('tip')=="корисник")
	{
		$this->grocery_crud->unset_add();
       
		$this->grocery_crud->unset_delete();
		$this->grocery_crud->unset_edit();
	}
	$this->grocery_crud->set_table('stavki');
	$this->grocery_crud->where("id_nalog=",$this->uri->segment(3));
$data_konto=array();
$data_partneri=array();
$data_nalozi=array();
$this->load->model('new_model');
if($k=$this->new_model->get_konto())
{
	$data_konto['records_k']=$k;
}
if($p=$this->new_model->get_partneri())
{
	$data_partneri['records_p']=$p;
}
if($n=$this->new_model->get_nalog())
{
	$data_nalozi['records_n']=$n;
}
$data=array_merge($data_konto,$data_nalozi,$data_partneri);

$this->grocery_crud->display_as('id_nalog','Број на налог')->display_as('konto','Конто')->display_as('opis','Партнер')->display_as('datum','Датум')->display_as('dolg','Долг')->display_as('pobaruvacka','Побарувачка');

$this->load->model('new_model');
	 $pom=$this->new_model->get_konto();
     foreach ($pom as $pom ){
		 $kluc=$pom->konto;
		 $vrednost=$pom->opis;
		 $niza[$kluc]=$vrednost;
		
	 }
	
	$this->grocery_crud->field_type('konto','dropdown',$niza);
	foreach ($niza as $i => $value) {
    unset($niza[$i]);
}
	$pom=$this->new_model->get_partneri();
     foreach ($pom as $pom ){
		 $kluc=$pom->sifra;
		 $vrednost=$pom->opis;
		 $niza[$kluc]=$vrednost;
		
	 }
	
	$this->grocery_crud->field_type('opis','dropdown',$niza);
	foreach ($niza as $i => $value) {
    unset($niza[$i]);
}
	$pom=$this->new_model->nalog();
     foreach ($pom as $pom ){
		 $kluc=$pom->id;
		 $vrednost=$pom->broj;
		 $niza[$kluc]=$vrednost;
		
	 }
	    if(count($niza)==0){$niza[0]="Ве молиме креирајте баш налог";}
	$this->grocery_crud->field_type('id_nalog','dropdown',$niza);

					  
$output = $this->grocery_crud->render();
 if ($this->session->userdata('tip')=="админ") $this->load->view('admin',$data);
else
 $this->load->view('smetkovoditelstvo.php',$data);
$this->load->view('prikaz.php',$output);      
$this->load->view('footer.php'); 
	
}
else redirect('novo','refresh');
}

function proverka()
{
	
	
	$this->load->model('new_model');
	 extract($_POST);
   
	$this->load->library('form_validation');

                
				$this->form_validation->set_rules('username', 'Корисничко име', 'required',
        array('required' => 'Ве молиме внесете корисничко име')
);
$this->form_validation->set_rules('password', 'Лозинка', 'required',
        array('required' => 'Ве молиме внесете лозинка')
);
				
				 if ($this->form_validation->run() == FALSE)
                {
                       $this->load->view('login');
	                   $this->load->view('login_info');
                }
                else
                {
                      

	
	$rez=$this->new_model->korisnici($username,md5($password));
	if($rez){
		
	      
          $data=array(
		  'najaven'=>true,
		  'najaven_korisnik'=>$username,
		  		  );
		  $this->session->set_userdata($data);
		  
		  redirect('novo/pocetna', 'refresh');
		 }
	else
	{   $greska=true;
		$this->load->view('login');
	 $this->load->view('login_greska');
	}
}}









function nalog ()
{if($this->session->userdata('najaven')==true)
{
	$data_konto=array();
$data_partneri=array();
$data_nalozi=array();
$this->load->model('new_model');
if($k=$this->new_model->get_konto())
{
	$data_konto['records_k']=$k;
}
if($p=$this->new_model->get_partneri())
{
	$data_partneri['records_p']=$p;
}
if($n=$this->new_model->get_nalog())
{
	$data_nalozi['records_n']=$n;
}
$data=array_merge($data_konto,$data_nalozi,$data_partneri);
$this->grocery_crud->display_as('broj','Број на налог')->display_as('opis','Опис')->display_as('datum','Датум')->display_as('korisnik','Корисник');

$this->grocery_crud->required_fields('korisnik');


	$this->grocery_crud->set_table('nalog');
	$this->grocery_crud->unset_back_to_list();
	
	$this->grocery_crud->unset_list();
	$this->grocery_crud->field_type('korisnik','dropdown',array($this->session->userdata('korisnik_id')=>$this->session->userdata('najaven_korisnik')));
	
	$output = $this->grocery_crud->render();
 if ($this->session->userdata('tip')=="админ") $this->load->view('admin',$data);
else
 $this->load->view('smetkovoditelstvo.php',$data);
 $this->load->view('prikaz.php',$output);
 $this->load->view('footer.php');
}
else
	{
		 redirect('novo', 'refresh');
	}
}




function dodadi()
{    
if($this->session->userdata('najaven')==true)
{
	$data_konto=array();
$data_partneri=array();
$data_nalozi=array();
$this->load->model('new_model');
if($k=$this->new_model->get_konto())
{
	$data_konto['records_k']=$k;
}
if($p=$this->new_model->get_partneri())
{
	$data_partneri['records_p']=$p;
}
if($n=$this->new_model->get_nalog())
{
	$data_nalozi['records_n']=$n;
}
$data=array_merge($data_konto,$data_nalozi,$data_partneri);

     $kluc;
     $vrednost;
	 $niza=Array();

	 $this->load->model('new_model');
	 $pom=$this->new_model->get_konto();
     foreach ($pom as $pom ){
		 $kluc=$pom->konto;
		 $vrednost=$pom->opis;
		 $niza[$kluc]=$vrednost;
		
	 }
	
	$this->grocery_crud->field_type('konto','dropdown',$niza);
	foreach ($niza as $i => $value) {
    unset($niza[$i]);
}
	$pom=$this->new_model->get_aktivni_partneri();
     foreach ($pom as $pom ){
		 $kluc=$pom->sifra;
		 $vrednost=$pom->opis;
		 $niza[$kluc]=$vrednost;
		
	 }
	
	$this->grocery_crud->field_type('opis','dropdown',$niza);
	foreach ($niza as $i => $value) {
    unset($niza[$i]);
}
	$pom=$this->new_model->nalog();
     foreach ($pom as $pom ){
		 $kluc=$pom->id;
		 $vrednost=$pom->broj;
		 $niza[$kluc]=$vrednost;
		
	 }
	 $this->grocery_crud->unset_list();
	    if(count($niza)==0){$niza[0]="Ве молиме креирајте ваш налог";}
	$this->grocery_crud->field_type('id_nalog','dropdown',$niza);
	$vtora_niza=array();
	if ($this->grocery_crud->getState() == 'add') {
		$pom=$this->new_model->nalog_na_korisnik();
     foreach ($pom as $pom ){
		 
		 $kluc=$pom->id;
		 $vrednost=$pom->broj;
		 $vtora_niza[$kluc]=$vrednost;
		
	 }
		
	    if(count($vtora_niza)==0){$vtora_niza[0]="Ве молиме креирајте ваш налог";}
$this->grocery_crud->field_type('id_nalog','dropdown',$vtora_niza);
}
	
$this->grocery_crud->set_table('stavki');
	$this->grocery_crud->unset_back_to_list();
	
	
	$this->grocery_crud->required_fields('id_nalog','konto','opis');
	
	$this->grocery_crud->display_as('id_nalog','Број на налог')->display_as('konto','Конто')->display_as('opis','Партнер')->display_as('datum','Датум')->display_as('dolg','Долг')->display_as('pobaruvacka','Побарувачка');

	
	$output = $this->grocery_crud->render();
 if ($this->session->userdata('tip')=="админ") $this->load->view('admin',$data);
else
 $this->load->view('smetkovoditelstvo.php',$data);
 $this->load->view('prikaz.php',$output);
 $this->load->view('footer.php');
}
else redirect ('novo','refresh');
}

public function odjava (){
	$this->session->set_userdata('najaven',false);
	$this->session->set_userdata('tip',"");
	$this->session->set_userdata('korisnik_id',"");
	$this->session->set_userdata('najaven_korisnik',"");
	redirect('novo', 'refresh');
}


public function administracija_konto ()
{
	if($this->session->userdata('najaven')==true and $this->session->userdata('tip')=="админ")
    {
	$this->grocery_crud->required_fields('opis','konto','kratok_opis');
	$this->grocery_crud->set_table('kontent_plan');
	$this->grocery_crud->display_as('konto','Конто')->display_as('kratok_opis','Краток опис')->display_as('opis','Опис');
	$output = $this->grocery_crud->render();
	
	$this->load->model('new_model');
if($k=$this->new_model->get_konto())
{
	$data_konto['records_k']=$k;
}
if($p=$this->new_model->get_partneri())
{
	$data_partneri['records_p']=$p;
}
if($n=$this->new_model->get_nalog())
{
	$data_nalozi['records_n']=$n;
}
$data=array_merge($data_konto,$data_nalozi,$data_partneri);
	$this->load->view('admin',$data);

 
  $this->load->view('prikaz.php',$output);
  $this->load->view('footer.php');
	
	
}
else 
	redirect ('novo/pocetna','refresh');
	
}

public function administracija_partneri ()
{
	if($this->session->userdata('najaven')==true and $this->session->userdata('tip')=="админ")
    {
	$this->grocery_crud->required_fields('opis','adresa','grad','smetka','telefon','e-mail','direktor');
	$this->grocery_crud->set_table('partneri');
	$this->grocery_crud->display_as('adresa','Адреса')->display_as('grad','Град')->display_as('opis','Опис')->display_as('telefon','Телефон')->display_as('e-mail','е-маил')->display_as('direktor','Директор')->display_as('activen','Активен');
	
	$this->grocery_crud->field_type('activen','dropdown',array('0'=>'Неактивен','1'=>'Активен'));
	
	
	
	$output = $this->grocery_crud->render();
	
	$this->load->model('new_model');
if($k=$this->new_model->get_konto())
{
	$data_konto['records_k']=$k;
}
if($p=$this->new_model->get_partneri())
{
	$data_partneri['records_p']=$p;
}
if($n=$this->new_model->get_nalog())
{
	$data_nalozi['records_n']=$n;
}
$data=array_merge($data_konto,$data_nalozi,$data_partneri);
	$this->load->view('admin',$data);

 
  $this->load->view('prikaz.php',$output);
  $this->load->view('footer.php');
	
	
}
else 
	redirect ('novo/pocetna','refresh');
	
}


public function administracija_korisnici ()
{
	if($this->session->userdata('najaven')==true and $this->session->userdata('tip')=="админ")
    {
	$this->grocery_crud->required_fields('korisnik','tip','lozinka');
	$this->grocery_crud->set_table('korisnici');
	$this->grocery_crud->display_as('korisnik','Корисник')->display_as('tip','Тип')->display_as('lozinka','Лозинка')->display_as('ime_prezime','Име и Презиме');
	
	$this->grocery_crud->field_type('tip','dropdown',array('админ'=>'Администрaтор','корисник'=>'Корисник'));
	
	$this->grocery_crud->change_field_type('lozinka','password');
	$this->grocery_crud->columns('korisnik','tip','ime_prezime');
	$this->grocery_crud->callback_before_insert(array($this,'enkripcija_callback'));
    $this->grocery_crud->callback_before_update(array($this,'enkripcija_callback'));
	$this->grocery_crud->unset_read();
	 $this->grocery_crud->unset_edit_fields('lozinka');
	
	
	
	
	$output = $this->grocery_crud->render();
	
	$this->load->model('new_model');
if($k=$this->new_model->get_konto())
{
	$data_konto['records_k']=$k;
}
if($p=$this->new_model->get_partneri())
{
	$data_partneri['records_p']=$p;
}
if($n=$this->new_model->get_nalog())
{
	$data_nalozi['records_n']=$n;
}
$data=array_merge($data_konto,$data_nalozi,$data_partneri);
	$this->load->view('admin',$data);

 
  $this->load->view('prikaz.php',$output);
  $this->load->view('footer.php');
	
	
}
else 
	redirect ('novo/pocetna','refresh');
	
}


public function profil(){
	if($this->session->userdata('najaven')==true)
	{
		$this->grocery_crud->set_table('korisnici');
		$this->grocery_crud->where('korisnik=',$this->session->userdata('najaven_korisnik'));
		
		$this->grocery_crud->unset_add();
       
		$this->grocery_crud->unset_delete();
		
		$this->grocery_crud->unset_read();
		$this->grocery_crud->change_field_type('lozinka','password');
	$this->grocery_crud->columns('ime_prezime','tip','lozinka');
    $this->grocery_crud->callback_before_update(array($this,'enkripcija_callback'));
	 $this->grocery_crud->unset_edit_fields('tip','korisnik');
	 $this->grocery_crud->display_as('korisnik','Корисник')->display_as('tip','Тип')->display_as('lozinka','Лозинка')->display_as('ime_prezime','Име и Презиме');
	$this->grocery_crud->unset_print();
	$this->grocery_crud->unset_export();
	
               
	$this->grocery_crud->set_rules(
        'lozinka', 'Лозинка',
        'required|min_length[8]|max_length[20]',
        array(
                'required'      => 'внесете %s.'
                
        )
);
	 
       $output = $this->grocery_crud->render();
	   
	   $this->load->model('new_model');
	   
	   if($k=$this->new_model->get_konto())
{
	$data_konto['records_k']=$k;
}
if($p=$this->new_model->get_partneri())
{
	$data_partneri['records_p']=$p;
}
if($n=$this->new_model->get_nalog())
{
	$data_nalozi['records_n']=$n;
}
$data=array_merge($data_konto,$data_nalozi,$data_partneri);
$broj_stavki=$this->new_model->broj_na_stavki($this->session->userdata('najaven_korisnik'));
$broj_nalozi=$this->new_model->broj_na_nalozi($this->session->userdata('najaven_korisnik'));
$data_nalog=$this->new_model->dati_na_nalozi($this->session->userdata('najaven_korisnik'));
$data_min=$this->new_model->min_data_na_nalozi($this->session->userdata('najaven_korisnik'));
$niza['vkupno_stavki']=$broj_stavki;
$niza['vkupno_nalozi']=$broj_nalozi;
$niza['dati_nalozi']=$data_nalog;
$niza['min_data']=$data_min;
if ($this->session->userdata('tip')=='админ')
	   $this->load->view('admin',$data);
   else 
       $this->load->view('smetkovoditelstvo',$data);
 
  $this->load->view('prikaz.php',$output);
  $this->load->view('statistika.php',$niza);
  $this->load->view('footer.php');
		
	}
	else
		redirect('novo/pocetna','refresh');
}








function enkripcija_callback($niza) {

 $this->load->model('new_model');
 if ($this->new_model->korisnici($this->session->userdata('najaven_korisnik'),$niza['lozinka']))
 return $niza;
 else{
$niza['lozinka'] = md5($niza['lozinka']);
 return $niza;}
} 

 

}
 