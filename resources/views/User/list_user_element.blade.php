
{{--<script src="https://www.gstatic.com/firebasejs/5.8.4/firebase.js"></script>--}}
{{--<script src="https://www.gstatic.com/firebasejs/5.8.0/firebase-firestore.js"></script>--}}
<script>
    // Initialize Firebase
//    var config = {
//        apiKey: "AIzaSyAQz_P8GdKuLS0Zc6YadYDXS_ITioJd-wU",
//        authDomain: "sirichai-896d6.firebaseapp.com",
//        databaseURL: "https://sirichai-896d6.firebaseio.com",
//        projectId: "sirichai-896d6",
//        storageBucket: "sirichai-896d6.appspot.com",
//        messagingSenderId: "679533428218"
//    };
//    firebase.initializeApp(config);
//
//    var db = firebase.firestore();
//
//    db.collection("users").add({
//        first: "Ada",
//        last: "Lovelace",
//        born: 1815
//    })
//        .then(function(docRef) {
//            console.log("Document written with ID: ", docRef.id);
//        })
//        .catch(function(error) {
//            console.error("Error adding document: ", error);
//        });
</script>

<div class="table-responsive">
    <table class="table">
        <tr>
            <th>ลำดับ</th>
            <th>ชื่อ</th>
            <th>สกุล</th>
            <th>Action</th>
        </tr>
        @foreach($profile as $key => $value)
            <tr>
                <td>{!! $key+1 !!}</td>
                <td>{!! $value->firstname !!}</td>
                <td>{!! $value->lastname !!}</td>
                <td>
                    <button class="btn-info btn-primary"><li class="fa fa-eye"></li></button>
                    {{--<button class="btn-info btn-warning edit-profile" data-toggle="modal" data-target="#edit-profile" data-id="{!!$value->id!!}"><li class="fa fa-edit"></li></button>--}}
                    <button class="btn-info btn-warning edit-profile" data-id="{!! $value->id !!}"><li class="fa fa-edit"></li></button>
                    <button class="btn-info btn-danger delete-profile" data-toggle="modal" data-target="#delete-profile" data-id="{!!$value->id!!}"><li class="fa fa-trash"></li></button>
                </td>
            </tr>
        @endforeach
    </table>
</div>

