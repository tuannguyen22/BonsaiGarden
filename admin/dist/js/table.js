update=  async function (id){

   
   let name= document.getElementById('name'+id).innerHTML;
   let job_title= document.getElementById('job_title'+id).innerHTML;
   let email= document.getElementById('email'+id).innerHTML;
   let age= document.getElementById('age'+id).innerHTML;
   let address= document.getElementById('address'+id).innerHTML;
   let phone= document.getElementById('phone'+id).innerHTML;

   let data={
        'id':id,
        'name':name,
        'job_title': job_title,
        'email':  email,
        'age' : age,
        'address': address,
        'phone' : phone,
   }

 await axios.put('tables.php/user?id='+id,data);
}