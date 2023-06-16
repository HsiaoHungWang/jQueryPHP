<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
                <h2>jQuery 練習</h2>
                <button id="buttonAdd" class="btn btn-primary mb-3" data-bs-toggle="modal"
                    data-bs-target="#userModal">新增</button>
                <table id="userTable" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>編號</th>
                            <th>姓名</th>
                            <th>電子郵件</th>
                            <th>年紀</th>
                            <th>編輯</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
            <div class="col-2"></div>
        </div>

        <div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="userModalLabel">資料修改</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-3">
                                <input type="hidden" id="id">
                                <label for="name" class="col-form-label">姓名:</label>
                                <input type="text" class="form-control" id="name">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="col-form-label">電子郵件:</label>
                                <input type="text" class="form-control" id="email">
                            </div>
                            <div class="mb-3">
                                <label for="age" class="col-form-label">年紀:</label>
                                <input type="text" class="form-control" id="age">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">關閉</button>
                        <button id="buttonUpdate" type="button" class="btn btn-primary">修改</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script>
        //$(document).ready(function(){ })
        //DOM Tree產生可以使用了
        $(function () {

            // const users = [
            //     { "name": "Tom", "email": "Tom@gmail.com", "age": 30 },
            //     { "name": "Mary", "email": "Mary@gmail.com", "age": 28 },
            //     { "name": "Jack2", "email": "Jack@gmail.com", "age": 32 },
            //     { "name": "John", "email": "John@gmail.com", "age": 25 }];

            //資料從localStorage取出來
            const users = JSON.parse(localStorage.getItem("users")) || [];


            //刪除陣列中的某一筆資料 splice("從陣列中的第幾個位置","刪除幾筆資料")
            // users.splice(1, 1); //從陣列中的第二個位置，刪除一筆資料
            //修改 splice("從陣列中的第幾個位置","刪除幾筆資料","然後在哪個位置上加入新的資料")
            //users.splice(1, 1, { "name": "??", "email": "Mary3@gmail.com", "age": 33 });
            //新增
            //users.push({ "name": "Mary3", "email": "Mary3@gmail.com", "age": 33 });

            //編輯資料
            $('#userTable>tbody').on('click', 'button:nth-child(1)', function () {
                //讀出Table中要修改的資料
                const row = ($(this).parents('tr'));
                const id = row.children('td:nth-child(1)').text(); //id
                const name = row.children('td:nth-child(2)').text(); //name
                const email = row.children('td:nth-child(3)').text(); //email
                const age = row.children('td:nth-child(4)').text(); //age
                //把修改的資料帶入到Modal中
                $('#id').val(id);
                $('#name').val(name);
                $('#email').val(email);
                $('#age').val(age);
            })

            //修改或新增資料
            $('#buttonUpdate').on('click', function () {
                //根據隱藏欄位中是否有值來判斷要做新增還是修改
                let idx = $('#id').val();

                //將使用者修改的資料包裝成user物件
                const user = { "name": $('#name').val(), "email": $('#email').val(), "age": $('#age').val() };
                if (idx === "") {
                    //console.log("新增")
                  //  users.push(user);

                    //將資料存進資料庫中
                    $.ajax({
                        url:'??.php', //將資料傳給這支PHP的程式
                        type:'POST', //透過POST的方法傳送資料
                        data:user,   //傳送到Server端的資料
                        dataType:'json' //Server回傳的結果為JSON格式
                    }).done(function(data){
                      //data 就是Server回傳的結果
                      console.log(data);
                    })




                } else {
                    //  console.log("修改")
                    //修改JSON中的資料
                    //JSON中第幾筆資料需要修改
                    users.splice(idx - 1, 1, user);
                }

                //更新localStorage中的資料
                // localStorage.setItem("users", JSON.stringify(users));

                //重新將JSON中的資料載入到網頁上
                ShowUsers();
                //隱藏Modal
                $('#userModal').modal('hide');


            })


            //刪除資料
            $('#userTable>tbody').on('click', 'button:nth-child(2)', function () {
                const idx = $(this).parents('tr').children('td:nth-child(1)').text() - 1;
                users.splice(idx, 1);  //只刪除資料，介面上的內容還在

                //更新localStorage中的資料
                localStorage.setItem("users", JSON.stringify(users));

                //重新將JSON中的資料載入到網頁上
                ShowUsers();
                //$(this).parents('tr').remove(); //只刪除介面上顯示的內容，資料還在
                //console.log(users);
            })

            //顯示資料
            function ShowUsers() {
                const docFrag = $(document.createDocumentFragment()); //建立一個空的物件
                $.each(users, function (idx, user) {
                    const { name, email, age } = user;
                    const data = `
                       <tr>
                            <td>${idx + 1}</td>
                            <td>${name}</td>
                            <td>${email}</td>
                            <td>${age}</td>
                            <td> 
                                <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#userModal">編輯</button>
                                <button class="btn btn-danger">刪除</button>
                            </td>
                        </tr>
                    `
                    docFrag.append(data);
                })

                $('#userTable>tbody').html(docFrag);
            }

            ShowUsers();

            //Modal隱藏
            $('#userModal').on('hide.bs.modal', function () {
                //清除所有input中的資料
                $('input').val("");
            })

            //Modal顯示
            $('#userModal').on('shown.bs.modal', function () {
                let idx = $('#id').val();
                if (idx === "") {
                    $('#buttonUpdate').text("新增");
                    $('#userModalLabel').text("使用者新增");
                } else {
                    $('#buttonUpdate').text("修改")
                    $('#userModalLabel').text("使用者修改");
                }


            })







        })
    </script>
</body>

</html>