<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Hello, world!</title>
</head>
<style>
.bg1 {
        background-color: red;
    }

.bg2 {
        background-color: plum;
        width: 250px;
        height: 500px;
        margin-right: 10px;
        float: left;
    }

.bg3 {
        background-color: green;
        width: 75%
    }

.bg4 {
        background-color: skyblue;
    }

.footphoto{
    width: 430px;
    margin: 10px;
    border-radius: 25%;
    border: 1px black solid;
    text-align: center;
}
</style>

<body>
    <div class="container">
        <img src="https://www.siambitcoin.com/wp-content/uploads/2021/10/PancakeSwap.jpg"
            class="img-fluid" alt="..." width="75%">
        <div class="container">
            <center>
            <div class="col-12 bg2"[Float:left]>Future World Economy</div>
            </center>
        </div>
        <div class="row">
            <div class="col-4">
                <div class="card" style="width: 20rem;">
                    <img src="https://s2.coinmarketcap.com/static/img/coins/200x200/1.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">Bitcoin is a decentralized digital currency created in January 2009. It follows the ideas set out in a white paper by the mysterious and pseudonymous Satoshi Nakamoto. The identity of the person or persons who created the technology is still a mystery.</p>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card" style="width: 20rem;">
                    <img src="https://sites.google.com/site/gatetouni/_/rsrc/1473238042961/solarsystem/earth/solar41.jpg"
                        class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">Ethereum is open access to digital money and data-friendly services for everyone – no matter your background or location. It's a community-built technology behind the cryptocurrency ether (ETH) and thousands of applications you can use today.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-9 bg4">
                <button id="btnBack"> Back </button>

                <div id="main" class="bg4">
                    
                    <table  class="table table-success table-striped ">
                        <thead >
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Details</th>
                            </tr>
                        </thead>
                        <tbody id="tblPost">
                        </tbody>
                    </table>
                </div>

                <div id="detail">
                    <table class="table table-success table-striped bg4">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>UserID</th>
                            </tr>
                        </thead>
                        <tbody id="tblDetails">
                        </tbody>
                    </table>
                </div>


            </div>
        </div>
        <div class="row">
            <div class="col-10 bg3">
                <center>
                <h4>63113203</h4>
                <h4>ธัญพิสิษฐ์ ส้มเกตุ</h4>
                <img class="footphoto" src="https://academy-public.coinmarketcap.com/optimized-uploads/ee721fd7a38840aba6247b5338514e31.jpg" alt="">
                </center>
            </div>
        </div>
    </div>
</body>
<script>
    function showDetails(id) {
        $("#main").hide();
        $("#detail").show();

        var url = "https://jsonplaceholder.typicode.com/posts/" + id

        $.getJSON(url)
            .done((data) => {
                console.log(data);
                var line = "<tr id='detailROW'";
                line += "><td>" + data.id + "</td>"
                line += "<td><b>" + data.title + "</b><br/>"
                line += data.body + "</td>"
                line += "<td>" + data.userId + "</td>"
                line += "</tr>";
                $("#tblDetails").append(line);
            })
            .fail((xhr, err, status) => {

            })


    }

    function LoadPosts() {
        var url = "https://jsonplaceholder.typicode.com/posts"
        var i = 0;
        $.getJSON(url)
            .done((data) => {
                $.each(data, (k, item) => {
                    i++;
                    var line = "<tr>";
                    line += "<td>" + item.id + "</td>"
                    line += "<td><b>" + item.title + "</b><br/>"
                    line += item.body + "</td>"
                    line += "<td><button onClick='showDetails(" + item.id + ");'>Link</button></td>"
                    line += "</tr>";
                    $("#tblPost").append(line);
                    if (i == 10) {
                        loadPost().stop();
                    };
                });
                $("#main").show();
            })
            .fail((xhr, err, status) => {

            })
    }

    $(() => {
        LoadPosts();
        $("#detail").hide();
        $("#btnBack").click(() => {
            $("#main").show();
            $("#detail").hide();
            $("#detailROW").remove();
        });
    })
</script>

</html>
