<div id="update_popup_container"></div>
<script>
    function update_popup() {
        var xhr = new XMLHttpRequest();
        xhr.onload = function () {
            if (xhr.status >= 200 && xhr.status < 300) {
                var element = document.getElementById('update_popup_container');
                element.innerHTML = xhr.response;
                console.log('success!', xhr);
            } else {
                console.log('The request failed!');
            }
        }
        xhr.open('POST', '{{ route('updateCookie') }}');
        xhr.send();
    }
</script>
