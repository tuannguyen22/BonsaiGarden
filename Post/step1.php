<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BonsaiGarden</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>




    <div class="container">
        <h2 class="text-center">
            Chọn danh mục đăng tin
        </h2>



        <form action='post.php' class='form-inline' id="district" method="post" enctype="multipart/form-data">

            <h4>Chọn Tỉnh Thành phố</h4>
            <select id="huyen" name='huyen' class='form-control mr-sm-2 col-12 text-right' required=''>

                <option value=''>Tỉnh / Thành phố</option>
            </select>
            <br />
            <br />

            <h4>Quận / Huyện</h4>
            <select id="quan" name='quan' required='' class='form-control mr-sm-2 col-12 text-right'>
                <option value=''>Quận / Huyện</option>
            </select>
            <br>
            <br> <br>
            <br>
            <input class='billing_address_1' name='' type='hidden' value=''>
            <input class='billing_address_2' name='' type='hidden' value=''>

            <!-- <button id='step2' type='button' class='text-lg-center form-control mr-sm-2 col-12 btn btn-warning' onclick='a2()'> NEXT </button> -->

            <button id="click1" class="form-control mr-sm-2 col-12 text-right" type="button"> <i class="fa fa-pagelines"> <input id='check11' type="checkbox" name="cate1"> </i></button>
            <br> <br>
            <button id="click2" class="form-control mr-sm-2 col-12 text-right" type="button"> <i class="fa fa-pagelines"> <input id='check22' type="checkbox" name="cate2"> </i></button>
            <br> <br>
            <button id="click3" class="form-control mr-sm-2 col-12 text-right" type="button"> <i class="fa fa-pagelines"> <input id='check33' type="checkbox" name="cate3"> </i></button>
            <br> <br>
            <button id="click4" class="form-control mr-sm-2 col-12 text-right" type="button"> <i class="fa fa-pagelines"> <input id='check44' type="checkbox" name="cate4"> </i></button>
            <br>
            <!-- <button type="button" id="step1" class="text-lg-center form-control mr-sm-2 col-12 btn btn-warning" onclick="a()"> NEXT </button> -->


            <h4>
                Nhập giá 
            </h4>
      
            <br>
            <input type="number" class="form-control  col-12 " id="price" name="price" step="0.01">
            <br>
            <br>
            <br>
            <h4>
                Nhập số lượng
            </h4>             
            <input type="number" class="form-control  col-12 "  id="quantity" name="quantity" min="0">
            <br>
            <br>
            <br>
            <h4>
                Nhập miêu tả sản phẩm
            </h4>             
            <input type="text" class="form-control  col-12 " id="content" name="content" min="0">
            <br>
            <br>
            <br>
            
            <div class="col-xs-12">
                        <div class="col-xs-6 col-sm-6 col-md-2 -3eNDZ">
                                    <button type="button"class="btn btn-brand btn-large">
                                        <img alt="https://static.chotot.com/storage/chotot-icons/svg/camera-icon.svg"role="presentation"src="https://static.chotot.com/storage/chotot-icons/svg/camera-icon.svg"><i>+</i>
                                        <input  id='image' name="image" accept="image/*" type="file" multiple="" class="form-control-file" onchange="readURL(this);">
                                            Đăng ảnh
                                        </button>
                                        <img id="blah" src="#" alt="your image" hidden />    

                        </div>
                    </div>
                 
                    <div class="col-xs-12">
                        <div class="alert alert-info">
                            <p><b>Để bán nhanh hơn:</b></p>
                            <ul>
                                <li>Chụp chi tết gần cây</li>
                                <li>Không quá gần cũng không quá xa </li>
                            </ul><br>
                            <p><b>Không nên:</b></p>
                            <ul>
                                <li>Không chèn số điện thoại / website/ logo</li>
                                <li>Không dùng hình lấy từ Internet</li>
                            </ul>
                        </div>
                    </div>
                    <div class="clearfix">

                    </div>
                    <button onclick="a4()"   id="step4" type="submit" class="text-lg-center form-control mr-sm-2 col-12 btn btn-warning"> ĐĂNG </button>

        </form>

    </div>
    <script>
        window.onload = init;
        var data = [];

        function init() {
            for (let i = 1; i <= 4; i++) {
                addClick(i);
            }
        }

        function addClick(id) {
            document.getElementById('click' + id).addEventListener('click', () => {
                if (document.getElementById('check' + id + '' + id).checked)
                    document.getElementById('check' + id + '' + id).checked = false;
                else
                    document.getElementById('check' + id + '' + id).checked = true;
            })
        }

        // async function a() {

        //         // let json = await axios.get('step2.php');
        //         //     document.getElementById('form').innerHTML='';
        //         //     let a=  document.createElement('div').innerHTML
        //         //     a=json.data;
        //         //     document.getElementById('form').innerHTML=a;  
        //         $('#form').attr('hidden',true);
        //        $('#district').removeAttr('hidden');




        //     }

        //     async function a2() {

        // let json = await axios.get('step3.php');
        //     document.getElementById('district').innerHTML='';
        //     let a=  document.createElement('div').innerHTML
        //     a=json.data;

        //     document.getElementById('district').innerHTML=a;   
        //     data.push( $( "#huyen option:selected" ).val()+ $( "#quan option:selected" ).val());


        // }
        //     async function a3() {


        //             let json = await axios.get('step4.php');
        //                 document.getElementById('district').innerHTML='';
        //                 let a=  document.createElement('div').innerHTML
        //                 a=json.data;
        //                 document.getElementById('district').innerHTML=a;  
        //                 data.push( $( "#quantity" ).val());
        //                 data.push( $( "#price" ).val());
        //                 data.push( $( "#content" ).val());



        //         }
        //         async function a4() {
        //             let postdata= {
        //                 address: data[0]+data[1],
        //                 quantity:data[2],
        //                 price:data[3],
        //                 content:data[4]
        //             }
        // let json = await axios.post('post.php',postdata);




        //         }
    </script>
    <script src='https://cdn.jsdelivr.net/gh/vietblogdao/js/districts.min.js'></script>
    <script>
        if (address_2 = localStorage.getItem('address_2_saved')) {
            $('select[name="quan"] option').each(function() {
                if ($(this).text() == address_2) {
                    $(this).attr('selected', '')
                }
            })
            $('input.billing_address_2').attr('value', address_2)
        }
        if (district = localStorage.getItem('district')) {
            $('select[name="quan"]').html(district)
            $('select[name="quan"]').on('change', function() {
                var target = $(this).children('option:selected')
                target.attr('selected', '')
                $('select[name="quan"] option').not(target).removeAttr('selected')
                address_2 = target.text()
                $('input.billing_address_2').attr('value', address_2)
                district = $('select[name="quan"]').html()
                localStorage.setItem('district', district)
                localStorage.setItem('address_2_saved', address_2)
            })
        }
        $('select[name="huyen"]').each(function() {
            var $this = $(this),
                stc = ''
            c.forEach(function(i, e) {
                e += +1
                stc += '<option value=' + e + '>' + i + '</option>'
                $this.html('<option value="">Tỉnh / Thành phố</option>' + stc)
                if (address_1 = localStorage.getItem('address_1_saved')) {
                    $('select[name="huyen"] option').each(function() {
                        if ($(this).text() == address_1) {
                            $(this).attr('selected', '')
                        }
                    })
                    $('input.billing_address_1').attr('value', address_1)
                }
                $this.on('change', function(i) {
                    i = $this.children('option:selected').index() - 1
                    var str = '',
                        r = $this.val()
                    if (r != '') {
                        arr[i].forEach(function(el) {
                            str += '<option value="' + el + '">' + el + '</option>'
                            $('select[name="quan"]').html('<option value="">Quận / Huyện</option>' + str)
                        })
                        var address_1 = $this.children('option:selected').text()
                        var district = $('select[name="quan"]').html()
                        localStorage.setItem('address_1_saved', address_1)
                        localStorage.setItem('district', district)
                        $('select[name="quan"]').on('change', function() {
                            var target = $(this).children('option:selected')
                            target.attr('selected', '')
                            $('select[name="quan"] option').not(target).removeAttr('selected')
                            var address_2 = target.text()
                            $('input.billing_address_2').attr('value', address_2)
                            district = $('select[name="quan"]').html()
                            localStorage.setItem('district', district)
                            localStorage.setItem('address_2_saved', address_2)
                        })
                    } else {
                        $('select[name="quan"]').html('<option value="">Quận / Huyện</option>')
                        district = $('select[name="quan"]').html()
                        localStorage.setItem('district', district)
                        localStorage.removeItem('address_1_saved', address_1)
                    }
                })
            })
        })
    </script>
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                $('#blah').removeAttr('hidden');

                reader.onload = function(e) {
                    $('#blah')
                        .attr('src', e.target.result)
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</body>

</html>