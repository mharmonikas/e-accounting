<?php
class New_model extends CI_Model{


     function get_partneri() {
   
   $p=$this->db->get('partneri'); 
    
    return $p->result();
}


     function get_aktivni_partneri() {
   $this->db->where('activen',true);
   $p=$this->db->get('partneri'); 
    
    return $p->result();
}

 function get_konto() {
   
   $k=$this->db->get('kontent_plan'); 
    
    return $k->result();
}

 function get_nalog() {
   
   $n=$this->db->get('nalog'); 
    
    return $n->result();
}
function korisnici($kor,$loz)
{
	$this->db->where('korisnik',$kor);
    $this->db->where('lozinka',$loz);
    $rez=$this->db->get('korisnici');
	
	if ($rez->num_rows()==1){
		$pom=$rez->row()->tip;
		$_SESSION['tip'] = $pom;
		$_SESSION['korisnik_id']=$rez->row()->id;
			
	return true;}
    else return false;
	
	}
  function broj_na_stavki ($kor)
        {
            $this->db->select('id_stavki');
            $this->db->from('stavki s'); 
            $this->db->join('nalog n', 'n.id=s.id_nalog');
            $this->db->join('korisnici k', 'k.id=n.korisnik');
            $this->db->where('k.korisnik',$kor);            
            $query = $this->db->get(); 
             return $query->num_rows();

        }

	 function broj_na_nalozi ($kor)
        {
            $this->db->select('n.id');
            $this->db->from('nalog n'); 
            $this->db->join('korisnici k', 'k.id=n.korisnik');
            $this->db->where('k.korisnik',$kor);            
            $query = $this->db->get(); 
             return $query->num_rows();

        }	
		
		function dati_na_nalozi ($kor)
        {
            $this->db->select_max('n.datum');
            $this->db->from('nalog n'); 
            $this->db->join('korisnici k', 'k.id=n.korisnik');
            $this->db->where('k.korisnik',$kor);            
            $query = $this->db->get(); 
             return $query->result();


        }
		
		function min_data_na_nalozi ($kor)
        {
            $this->db->select_min('n.datum');
            $this->db->from('nalog n'); 
            $this->db->join('korisnici k', 'k.id=n.korisnik');
            $this->db->where('k.korisnik',$kor);            
            $query = $this->db->get(); 
             return $query->result();


        }
		

function get_konto_niza(){
	$this->db->select('opis');
	$rez=$this->db->get('kontent_plan');
	return $rez;
	
}
  function nalog() {
   
   $n=$this->db->get('nalog'); 
    
    return $n->result();
}
    function nalog_na_korisnik() {
   $this->db->where('korisnik',$this->session->userdata('korisnik_id'));
   $this->db->where('datum',date('Y-m-d'));
   $n=$this->db->get('nalog'); 
    
    return $n->result();
}   
}