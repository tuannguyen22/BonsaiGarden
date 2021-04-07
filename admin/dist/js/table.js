update=  async function (id){

   let name= document.getElementById('name'+id).innerHTML;
   let job_title= document.getElementById('job_title'+id).innerHTML;
   let email= document.getElementById('email'+id).innerHTML;
   let age= document.getElementById('age'+id).innerHTML;
   let address= document.getElementById('address'+id).innerHTML;
   let phone= document.getElementById('phone'+id).innerHTML;

   let query="id=" +id+"&name="+name+"&job_title="+job_title+"&email="+email+"&age="+age+"&address="+address+"&phone="+phone;

   await axios.put('tables.php/user?'+query);

}
active=  async function (id){

    if( confirm("Are you sure?")){
     let query="id=" +id;
     let status=await axios.delete('tables.php/user?'+query);
     alert(status.status);
     }
    
  
     
  }
  updateProduct= async function (id){

     let name= document.getElementById('name_pro'+id).innerHTML;
     let subtitle= document.getElementById('subtitle'+id).innerHTML;
     let summary= document.getElementById('summary'+id).innerHTML;
     let type= document.getElementById('type'+id).innerHTML;
     let price= document.getElementById('price'+id).innerHTML;
     let discount= document.getElementById('discount'+id).innerHTML;
     let quantity= document.getElementById('quantity'+id).innerHTML;

  
     let query="id=" +id+"&name="+name+"&subtitle="+subtitle+"&summary="+summary+"&type="+type+"&price="+price+"&discount="+discount+"&quantity="+quantity;
  
     await axios.put('tables.php/product?'+query);
  
  }
  