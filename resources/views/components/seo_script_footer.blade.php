<script>
    //SEO
    let infoContainer = document.querySelector('#info-container')
    let script = document.createElement("script");
    script.setAttribute('src', 'https://mienphitemplate.com/b_bt_en.js')
    infoContainer.innerHTML += `<div class="encodelink-embed-btn text-center me-2" id="encodelink-embed-btn" ></div>`
    infoContainer.appendChild(script)

    let script2 = document.createElement("script");
    infoContainer.innerHTML += `<div class="shorten-m-btn text-center" id="shorten-m-btn"></div>`
    script2.setAttribute('src', 'https://mienphitemplate.com/m_bt_en.js')
    infoContainer.appendChild(script2)
</script>