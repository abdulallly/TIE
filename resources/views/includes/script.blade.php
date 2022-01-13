<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE -->
<script src="{{ asset('dist/js/adminlte.js') }}"></script>
{{--<script src="{{ asset('dist/js/pages/dashboard3.js') }}"></script>--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<script>
    let elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

    elems.forEach(function(html) {
        let switchery = new Switchery(html,  { size: 'small' });
     });

    $(function() {
        $('.js-switch').change(function() {
            var status = $(this).prop('checked') == true ? 1 : 0;
            var user_id = $(this).data('id');
            console.log(status);
            $.ajax({
                headers: "'X-CSRF-TOKEN': $('meta[name=\"csrf-token\"]').attr('content')",
                type: "GET",
                dataType: "json",
                url: '/userChangeStatus',
                data: {'status': status, 'user_id': user_id},
                success: function(data){
                }
            });
        })
    })
</script>

<script type="text/javascript">
    //add row
    $(document).ready(function () {
        $("#addRow").click(function () {
            var html = '';
            html += '<div id="inputFormRow">';
            html += '<div class="input-group mb-1">';
            html += '<input type="text" name="title[]" class="form-control m-input" placeholder="Weka jina" autocomplete="off">';
            html += '<div class="input-group-append">';
            html += '<button id="removeRow" type="button" class="btn btn-danger" <i class="fa fa-minus-circle" aria-hidden="true"></i>Ondoa</button>';
            html += '</div>';
            html += '</div>';
            html += '</div>';
            $('#newRow').append(html);
        });
        // remove row
        $(document).on('click', '#removeRow', function () {
            $(this).closest('#inputFormRow').remove();
        });
    });
</script>
<script type="text/javascript">
    //add row
    $(document).ready(function () {
        $("#addRows").click(function () {
            var html = '';
            html += '<div id="inputFormRows">';
            html += '<div class="input-group mb-1">';
            html += '<input type="text" name="title[]" class="form-control m-input" placeholder="weka jina" autocomplete="off">';
            html += '<div class="input-group-append">';
            html += '<button id="removeRow" type="button" class="btn btn-danger" <i class="fa fa-minus-circle" aria-hidden="true"></i>Remove</button>';
            html += '</div>';
            html += '</div>';
            html += '</div>';
            $('#newRows').append(html);
        });
        // remove row
        $(document).on('click', '#removeRows', function () {
            $(this).closest('#inputFormRows').remove();
        });
    });
</script>
<script type="text/javascript">
    //add row
    $(document).ready(function () {
        $("#addRow11").click(function () {
            var html = '';
            html += '<div id="inputFormRow1">';
            html += '<div class="input-group mb-1">';
            html += '<textarea type="text" name="name[]" class="form-control m-input" placeholder="weka jina" autocomplete="off">';
            html += '<div class="input-group-append">';
            html += '<button id="removeRow1" type="button" class="btn btn-danger" <i class="fa fa-minus-circle" aria-hidden="true"></i>Ondoa</button>';
            html += '</div>';
            html += '</div>';
            html += '</div>';
            $('#newRow11').append(html);
        });
        // remove row
        $(document).on('click', '#removeRow1', function () {
            $(this).closest('#inputFormRow11').remove();
        });
    });
</script>
<script type="text/javascript">
    //add row
    $(document).ready(function () {
        $("#addRowsTaasis").click(function () {
            var html = '';
            html += '<div id="inputFormRowsTaasis">';
            html += '<div class="input-group mb-1">';
            html +='<input class="form-control" id="sheria"  rows="3" name="name[]" required pattern="[a-zA-Z\'-\'\\s]*" title="only string is allowed"  autofocus="off" />';
            html += '<div class="input-group-append">';
            html += '<button id="removeRowsTaasis" type="button" class="btn btn-danger" <i class="fa fa-minus-circle" aria-hidden="true"></i>Ondoa</button>';
            html += '</div>';
            html += '</div>';
            html += '</div>';
            $('#newRowsTaasis').append(html);
        });
        // remove row
        $(document).on('click', '#removeRowsTaasis', function () {
            $(this).closest('#inputFormRowsTaasis').remove();
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $("#addRowswizara").click(function () {
            var html = '';
            html += '<div id="inputFormRowswizara">';
            html += '<div class="input-group mb-1">';
            html +='<input class="form-control" id="wizara"  rows="3" name="name[]" required pattern="[a-zA-Z\'-\'\\s]*" title="only string is allowed" autofocus="off" />';
            html += '<div class="input-group-append">';
            html += '<button id="removeRowswizara" type="button" class="btn btn-danger" <i class="fa fa-minus-circle" aria-hidden="true"></i>Ondoa</button>';
            html += '</div>';
            html += '</div>';
            html += '</div>';
            $('#newRowswizara').append(html);
        });
        // remove row
        $(document).on('click', '#removeRowswizara', function () {
            $(this).closest('#inputFormRowswizara').remove();
        });
    });
</script>
<script type="text/javascript">
    //add row
    $(document).ready(function () {
        $("#addRowsWizara").click(function () {
            var html = '';
            html += '<div id="inputFormRowsWizara">';
            html += '<div class="input-group mb-1">';
            html += '<input type="text" name="name[]" class="form-control m-input" pattern="[a-zA-Z\'-\'\\s]*" title="only string is allowed"  autocomplete="off">';
            html += '<div class="input-group-append">';
            html += '<button id="removeRowsWizara" type="button" class="btn btn-danger" <i class="fa fa-minus-circle" aria-hidden="true"></i>Ondoa</button>';
            html += '</div>';
            html += '</div>';
            html += '</div>';
            $('#newRowsWizara').append(html);
        });
        // remove row
        $(document).on('click', '#removeRowsWizara', function () {
            $(this).closest('#inputFormRowsWizara').remove();
        });
    });
</script>
<script type="text/javascript">
    //add row
    $(document).ready(function () {
        $("#addRowsstandard").click(function () {
            var html = '';
            html += '<div id="inputFormRowsstandard">';
            html += '<div class="input-group mb-1">';
            html += ' <input type="text" name="name[]" class="form-control m-input"  autocomplete="off" required placeholder="Standard I"  autofocus>';
            html += '<div class="input-group-append">';
            html += '<button id="removeRowsstandard" type="button" class="btn btn-danger" <i class="fa fa-minus-circle" aria-hidden="true"></i>Remove</button>';
            html += '</div>';
            html += '</div>';
            html += '</div>';
            $('#newRowsstandard').append(html);
        });
        // remove row
        $(document).on('click', '#removeRowsstandard', function () {
            $(this).closest('#inputFormRowsstandard').remove();
        });
    });
</script>
<script type="text/javascript">
    //add row
    $(document).ready(function () {
        $("#addRowsbookcategory").click(function () {
            var html = '';
            html += '<div id="inputFormRowsbookcategory">';
            html += '<div class="input-group mb-1">';
            html += '<input type="text" name="name[]" class="form-control m-input" placeholder="Name of book category" pattern="[a-zA-Z\'-\'\\s]*" title="only string is allowed" autocomplete="on" required>';
            html += '<input type="number" name="quantity[]" class="form-control m-input" placeholder="Quantity of book category" min="0" autocomplete="on" required>';
            html += '<div class="input-group-append">';
            html += '<button id="removeRowsbookcategory" type="button" class="btn btn-danger" <i class="fa fa-minus-circle" aria-hidden="true"></i>remove</button>';
            html += '</div>';
            html += '</div>';
            html += '</div>';
            $('#newRowsbookcategory').append(html);
        });
        // remove row
        $(document).on('click', '#removeRowsbookcategory', function () {
            $(this).closest('#inputFormRowsbookcategory').remove();
        });
    });
</script>
<script type="text/javascript">
    //add row
    $(document).ready(function () {
        $("#addRowsbook").click(function () {
            var html = '';
            html += '<div id="inputFormRowsbook">';
            html += '<div class="input-group mb-1">';
            html += '<input type="text" name="name[]" class="form-control m-input" pattern="[a-zA-Z\'-\'\\s]*" title="only string is allowed" placeholder="Kiswahili" autocomplete="off">';
            html += '<div class="input-group-append">';
            html += '<button id="removeRowsbook" type="button" class="btn btn-danger" <i class="fa fa-minus-circle" aria-hidden="true"></i>Remove</button>';
            html += '</div>';
            html += '</div>';
            html += '</div>';
            $('#newRowsbook').append(html);
        });
        // remove row
        $(document).on('click', '#removeRowsbook', function () {
            $(this).closest('#inputFormRowsbook').remove();
        });
    });
</script>
<script type="text/javascript">
    //add row
    $(document).ready(function () {
        $("#Region").click(function () {
            var html = '';
            html += '<div id="inputRegion">';
            html += '<div class="input-group mb-1">';
            html +=' <input type="text" name="name[]" class="form-control m-input" placeholder="Region name" pattern="[a-zA-Z\'-\'\\s]*" title="only string is allowed" autocomplete="on">'
            html += '<div class="input-group-append">';
            html += '<button id="removeRegion" type="button" class="btn btn-danger" <i class="fa fa-minus-circle" aria-hidden="true"></i>Remove</button>';
            html += '</div>';
            html += '</div>';
            html += '</div>';
            $('#newRegion').append(html);
        });
        // remove row
        $(document).on('click', '#removeRegion', function () {
            $(this).closest('#inputRegion').remove();
        });
    });
</script>
<script type="text/javascript">
    //add row
    $(document).ready(function () {
        $("#councilrow").click(function () {
            var html = '';
            html += '<div id="inputCouncilform">';
            html += '<div class="input-group mb-1">';
            html += '<input type="text" name="name[]" class="form-control m-input" placeholder="Council name" pattern="[a-zA-Z\'-\'\\s]*" title="only string is allowed" autocomplete="on" required>';
            html += '<input type="number" name="code[]" class="form-control m-input" placeholder="Council code" autocomplete="on" required>';
            html += '<div class="input-group-append">';
            html += '<button id="removecouncilrow" type="button" class="btn btn-danger" <i class="fa fa-minus-circle" aria-hidden="true"></i>remove</button>';
            html += '</div>';
            html += '</div>';
            html += '</div>';
            $('#newCouncilrow').append(html);
        });
        // remove row
        $(document).on('click', '#removecouncilrow', function () {
            $(this).closest('#inputCouncilform').remove();
        });
    });
</script>
<script type="text/javascript">
    //add row
    $(document).ready(function () {
        $("#schoolrow").click(function () {
            var html = '';
            html += '<div id="inputschoolform">';
            html += '<div class="input-group mb-1">';
            html += '<input type="text" name="name[]" class="form-control m-input" placeholder="School name" pattern="[a-zA-Z\'-\'\\s]*" title="only string is allowed" autocomplete="on" required>';
            html += '<div class="input-group-append">';
            html += '<button id="removeschoolrow" type="button" class="btn btn-danger" <i class="fa fa-minus-circle" aria-hidden="true"></i>remove</button>';
            html += '</div>';
            html += '</div>';
            html += '</div>';
            $('#newschoolrow').append(html);
        });
        // remove row
        $(document).on('click', '#removeschoolrow', function () {
            $(this).closest('#inputschoolform').remove();
        });
    });
</script>
<script type="text/javascript">
    function Form1() {
        window.reload();
    }
</script>


<script type="text/javascript">
    $(document).ready(function (){
        $('select[name="regions_id"]').on('change',function(){
            var regionID = $(this).val();
            if (regionID) {
                $.ajax({
                    url:'/getCouncils/'+regionID,
                    type: 'GET',
                    dataType:'json',
                    success:function(data){
                        jQuery('select[name="councils_id"]').empty().append('<option value="">Please select council</option>');
                        $.each(data,function(key,value){
                            console.log(value);
                            $('select[name="councils_id"]').append('<option value="'+ value.id+'">'+value.name+'</option>');
                         });
                    }
                });
            }
            else{
                $('select[name="councils_id"]').empty();
            }
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function (){
        $('select[name="region_id"]').on('change',function(){
            var regionID = $(this).val();
            if (regionID) {
                $.ajax({
                    url:'/getCouncils/'+regionID,
                    type: 'GET',
                    dataType:'json',
                    success:function(data){
                        jQuery('select[name="council_id"]').empty().append('<option value="">Please select council</option>');
                        $.each(data,function(key,value){
                            console.log(key);
                            console.log(value);
                            $('select[name="council_id"]').append('<option value="'+ value.id+'">'+value.name+'</option>');
                         });
                    }
                });
            }
            else{
                $('select[name="council_id"]').empty();
            }
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function (){
        $('select[name="councils_id"]').on('change',function(){
            var councilID = $(this).val();
            if (councilID) {
                $.ajax({
                    url:'/getSchools/'+councilID,
                    type: 'GET',
                    dataType:'json',
                    success:function(data){
                        jQuery('select[name="schools_id"]').empty().append('<option value="">Please select school</option>');
                         $.each(data,function(key,value){
                            console.log(data);
                            console.log(key);
                            console.log(value);
                            $('select[name="schools_id"]').append('<option value="'+ value.id+'">'+value.name+'</option>');
                         });
                    }
                });
            }
            else{
                $('select[name="schools_id"]').empty();
            }
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function (){
        $('select[name="council_id"]').on('change',function(){
            var councilID = $(this).val();
            if (councilID) {
                $.ajax({
                    url:'/getSchools/'+councilID,
                    type: 'GET',
                    dataType:'json',
                    success:function(data){
                        jQuery('select[name="school_id"]').empty().append('<option value="">Please select school</option>');
                         $.each(data,function(key,value){
                            console.log(value);
                            $('select[name="school_id"]').append('<option value="'+ value.id+'">'+value.name+'</option>');
                         });
                    }
                });
            }
            else{
                $('select[name="school_id"]').empty();
            }
        });
    });
</script>



<script type="text/javascript">
    $(document).ready(function (){
        $('select[name="school_id"]').on('change',function(){
            var schoolID = $(this).val();
            if (schoolID) {
                $.ajax({
                    url:'/getStandard/'+schoolID,
                    type: 'GET',
                    dataType:'json',
                    success:function(data){
                        jQuery('select[name="standard_id"]').empty().append('<option value="">Please Select Stardards</option>');
                        $.each(data,function(key,value){
                            console.log(value);
                            $('select[name="standard_id"]').append('<option value="'+ value.standard_id+'">'+value.name+" , Male = "+value.male+" , Female = "+value.female+" , Total Student = "+parseFloat(value.male+value.female)+'</option>');
                        });
                    }
                });
            }
            else{
                $('select[name="standard_id"]').empty();
            }
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function (){
        $('select[name="book_id"]').on('change',function(){
            var bookID = $(this).val();
            if (bookID) {
                $.ajax({
                    url:'/getBookcategory/'+bookID,
                    type: 'GET',
                    dataType:'json',
                    success:function(data){
                        jQuery('select[name="bookcategory_id"]').empty().append('<option value="">Please select book category</option>');
                         $.each(data,function(key,value){
                            $('select[name="bookcategory_id"]').append('<option value="'+ value.id+'">'+value.name+", Quantity = "+value.quantity+" ,For "+value.standardname +'</option>');
                         });
                    }
                });
            }
            else{
                $('select[name="bookcategory_id"]').empty();
            }
        });
    });
</script>


<script type="text/javascript">
    $(document).ready(function (){
        $('select[name="book_id"]').on('change',function(){
            var bookID = $(this).val();
            if (bookID) {
                $.ajax({
                    url:'/getBookcategory/'+bookID,
                    type: 'GET',
                    dataType:'json',
                    success:function(data){
                        jQuery('select[name="bookcategoryy_id"]').empty().append('<option value="">Please select book category</option>');
                        $.each(data,function(key,value){
                            $('select[name="bookcategoryy_id"]').append('<option value="'+ value.id+'">'+value.name+", Quantity = "+value.quantity+" ,For "+value.standardname +'</option>');
                        });
                    }
                });
            }
            else{
                $('select[name="bookcategoryy_id"]').empty();
            }
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#choose-file').change(function () {
            var i = $(this).prev('label').clone();
            var file = $('#choose-file')[0].files[0].name;
            $(this).prev('label').text(file);
        });
    });
</script>

<script>
    // Add the following code if you want the name of the file appear on select
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $(".alert").delay(58800).slideUp(10000);
    });
</script>



