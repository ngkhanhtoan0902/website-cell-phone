<script>
    const DOMAIN_APP = "{{env('MAIN_APP_URL')}}"
    const DOMAIN = window.location.origin
    const RETRY_IN_MINUTES = 15;

    async function initLogin() {
        let token = await fetchLoginInfo();
        if (token) {
            await loginByToken(token);
        }
    }

    async function fetchLoginInfo() {
        let api = DOMAIN_APP + '/api/services/core/sso/sync';
        let response = await sendRequest(api);
        return response ? response.data : null
    }

    async function loginByToken(token) {
        let api = '/api/services/academy/v1/core/login-by-token?token=' + token;
        let response = await sendRequest(api);
        if (response && response.status == 200)
            window.location.reload();
    }

    async function sendRequest(url) {
        return await fetch(url, {
            method: 'GET',
            credentials: 'include', // include, *same-origin, omit
        }).then(response => {
            return response.status == 200 ? response.json() : null;
        });
    }

    window.onload = initLogin();

    setInterval(() => {
        initLogin(true);
    }, RETRY_IN_MINUTES * 60 * 1000);
</script>