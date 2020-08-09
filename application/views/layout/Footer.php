
<script>
function renderEditData(data){
    if (data === null) return false
    for (const key of Object.keys(data)){
        if ($(`.${key}`).length){
            $(`.${key}`).val(data[key])
        }
    }
}
$(document).ready( function () {
    $('.datatables').DataTable();
    $('.deletethis').on('click', function(){
        if (confirm($(this).attr('message') ? $(this).attr('message') : 'Apakah anda yakin ingin menghapus data ini ?')){
            $.ajax({
                url: $(this).attr('url'),
                method: 'post',
                data: {
                    ids: $(this).attr('ids')
                },
                dataType: 'json',
                success: resp => {
                    window.location = ''
                },
                error: err => {
                    alert('Something went wrong '+ err.message !== undefined ? err.message : err)
                }
            })
        }
    })

    
});
</script>
</body>
</html>