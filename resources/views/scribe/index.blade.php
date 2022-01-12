<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>AFSP Documentation</title>

    <link href="https://fonts.googleapis.com/css?family=PT+Sans&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset("vendor/scribe/css/theme-default.style.css") }}" media="screen">
    <link rel="stylesheet" href="{{ asset("vendor/scribe/css/theme-default.print.css") }}" media="print">

    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.10/lodash.min.js"></script>

    <link rel="stylesheet"
          href="https://unpkg.com/@highlightjs/cdn-assets@10.7.2/styles/obsidian.min.css">
    <script src="https://unpkg.com/@highlightjs/cdn-assets@10.7.2/highlight.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jets/0.14.1/jets.min.js"></script>

    <style id="language-style">
        /* starts out as display none and is replaced with js later  */
                    body .content .bash-example code { display: none; }
                    body .content .javascript-example code { display: none; }
            </style>

    <script>
        var baseUrl = "http://localhost";
        var useCsrf = Boolean();
        var csrfUrl = "/sanctum/csrf-cookie";
    </script>
    <script src="{{ asset("vendor/scribe/js/tryitout-3.19.1.js") }}"></script>

    <script src="{{ asset("vendor/scribe/js/theme-default-3.19.1.js") }}"></script>

</head>

<body data-languages="[&quot;bash&quot;,&quot;javascript&quot;]">

<a href="#" id="nav-button">
    <span>
        MENU
        <img src="{{ asset("vendor/scribe/images/navbar.png") }}" alt="navbar-image" />
    </span>
</a>
<div class="tocify-wrapper">
    
            <div class="lang-selector">
                                            <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                            <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                    </div>
    
    <div class="search">
        <input type="text" class="search" id="input-search" placeholder="Search">
    </div>

    <div id="toc">
                                                                            <ul id="tocify-header-0" class="tocify-header">
                    <li class="tocify-item level-1" data-unique="introduction">
                        <a href="#introduction">Introduction</a>
                    </li>
                                            
                                                                    </ul>
                                                <ul id="tocify-header-1" class="tocify-header">
                    <li class="tocify-item level-1" data-unique="authenticating-requests">
                        <a href="#authenticating-requests">Authenticating requests</a>
                    </li>
                                            
                                                </ul>
                    
                    <ul id="tocify-header-2" class="tocify-header">
                <li class="tocify-item level-1" data-unique="endpoints">
                    <a href="#endpoints">Endpoints</a>
                </li>
                                    <ul id="tocify-subheader-endpoints" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="endpoints-GETapi-user">
                        <a href="#endpoints-GETapi-user">GET api/user</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTapi-login">
                        <a href="#endpoints-POSTapi-login">POST api/login</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTapi-register">
                        <a href="#endpoints-POSTapi-register">POST api/register</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTapi-password-reset">
                        <a href="#endpoints-POSTapi-password-reset">Reset the given user&#039;s password.</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTapi-password-email">
                        <a href="#endpoints-POSTapi-password-email">Send a reset link to the given user.</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTapi-social-login-facebook">
                        <a href="#endpoints-POSTapi-social-login-facebook">POST api/social/login/facebook</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-GETapi-email-verify">
                        <a href="#endpoints-GETapi-email-verify">GET api/email/verify</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTapi-email-resend">
                        <a href="#endpoints-POSTapi-email-resend">POST api/email/resend</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTapi-logout">
                        <a href="#endpoints-POSTapi-logout">POST api/logout</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="endpoints-POSTapi-user-update">
                        <a href="#endpoints-POSTapi-user-update">POST api/user/update</a>
                    </li>
                                                    </ul>
                            </ul>
                    <ul id="tocify-header-3" class="tocify-header">
                <li class="tocify-item level-1" data-unique="helpful-resources-management">
                    <a href="#helpful-resources-management">Helpful Resources management</a>
                </li>
                                    <ul id="tocify-subheader-helpful-resources-management" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="helpful-resources-management-POSTapi-helpful-resources">
                        <a href="#helpful-resources-management-POSTapi-helpful-resources">POST api/helpful-resources</a>
                    </li>
                                                    </ul>
                            </ul>
                    <ul id="tocify-header-4" class="tocify-header">
                <li class="tocify-item level-1" data-unique="memory-friends-management">
                    <a href="#memory-friends-management">Memory Friends management</a>
                </li>
                                    <ul id="tocify-subheader-memory-friends-management" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="memory-friends-management-POSTapi-memory-friend-submit">
                        <a href="#memory-friends-management-POSTapi-memory-friend-submit">POST api/memory/friend/submit</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="memory-friends-management-POSTapi-memory-friend-review">
                        <a href="#memory-friends-management-POSTapi-memory-friend-review">POST api/memory/friend/review</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="memory-friends-management-POSTapi-memory-friend-approve">
                        <a href="#memory-friends-management-POSTapi-memory-friend-approve">POST api/memory/friend/approve</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="memory-friends-management-POSTapi-memory-friend-delete">
                        <a href="#memory-friends-management-POSTapi-memory-friend-delete">POST api/memory/friend/delete</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="memory-friends-management-POSTapi-memory-add-invite-friends">
                        <a href="#memory-friends-management-POSTapi-memory-add-invite-friends">POST api/memory/add/invite/friends</a>
                    </li>
                                                    </ul>
                            </ul>
                    <ul id="tocify-header-5" class="tocify-header">
                <li class="tocify-item level-1" data-unique="memory-media-upload-management">
                    <a href="#memory-media-upload-management">Memory Media upload management</a>
                </li>
                                    <ul id="tocify-subheader-memory-media-upload-management" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="memory-media-upload-management-POSTapi-memory-add-cover">
                        <a href="#memory-media-upload-management-POSTapi-memory-add-cover">POST api/memory/add/cover</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="memory-media-upload-management-POSTapi-memory-add-image">
                        <a href="#memory-media-upload-management-POSTapi-memory-add-image">POST api/memory/add/image</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="memory-media-upload-management-POSTapi-memory-add-video">
                        <a href="#memory-media-upload-management-POSTapi-memory-add-video">POST api/memory/add/video</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="memory-media-upload-management-POSTapi-memory-delete-cover">
                        <a href="#memory-media-upload-management-POSTapi-memory-delete-cover">POST api/memory/delete/cover</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="memory-media-upload-management-POSTapi-memory-delete-image">
                        <a href="#memory-media-upload-management-POSTapi-memory-delete-image">POST api/memory/delete/image</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="memory-media-upload-management-POSTapi-memory-delete-video">
                        <a href="#memory-media-upload-management-POSTapi-memory-delete-video">POST api/memory/delete/video</a>
                    </li>
                                                    </ul>
                            </ul>
                    <ul id="tocify-header-6" class="tocify-header">
                <li class="tocify-item level-1" data-unique="memory-notifications-management">
                    <a href="#memory-notifications-management">Memory Notifications management</a>
                </li>
                                    <ul id="tocify-subheader-memory-notifications-management" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="memory-notifications-management-POSTapi-user-notifications-all-read">
                        <a href="#memory-notifications-management-POSTapi-user-notifications-all-read">POST api/user/notifications/all/read</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="memory-notifications-management-POSTapi-memory-notifications">
                        <a href="#memory-notifications-management-POSTapi-memory-notifications">POST api/memory/notifications</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="memory-notifications-management-POSTapi-memory-notification-read">
                        <a href="#memory-notifications-management-POSTapi-memory-notification-read">POST api/memory/notification/read</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="memory-notifications-management-POSTapi-memory-notifications-all-read">
                        <a href="#memory-notifications-management-POSTapi-memory-notifications-all-read">POST api/memory/notifications/all/read</a>
                    </li>
                                                    </ul>
                            </ul>
                    <ul id="tocify-header-7" class="tocify-header">
                <li class="tocify-item level-1" data-unique="memory-create-management">
                    <a href="#memory-create-management">Memory create management</a>
                </li>
                                    <ul id="tocify-subheader-memory-create-management" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="memory-create-management-POSTapi-memory-add">
                        <a href="#memory-create-management-POSTapi-memory-add">POST api/memory/add</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="memory-create-management-POSTapi-memory-add-description">
                        <a href="#memory-create-management-POSTapi-memory-add-description">POST api/memory/add/description</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="memory-create-management-POSTapi-memory-add-favorite-memory">
                        <a href="#memory-create-management-POSTapi-memory-add-favorite-memory">POST api/memory/add/favorite-memory</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="memory-create-management-POSTapi-memory-add-special-dates">
                        <a href="#memory-create-management-POSTapi-memory-add-special-dates">POST api/memory/add/special-dates</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="memory-create-management-POSTapi-memory-add-theme">
                        <a href="#memory-create-management-POSTapi-memory-add-theme">POST api/memory/add/theme</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="memory-create-management-POSTapi-memory-add-visibility">
                        <a href="#memory-create-management-POSTapi-memory-add-visibility">POST api/memory/add/visibility</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="memory-create-management-POSTapi-memory-add-submit">
                        <a href="#memory-create-management-POSTapi-memory-add-submit">POST api/memory/add/submit</a>
                    </li>
                                                    </ul>
                            </ul>
                    <ul id="tocify-header-8" class="tocify-header">
                <li class="tocify-item level-1" data-unique="memory-fetch-management">
                    <a href="#memory-fetch-management">Memory fetch management</a>
                </li>
                                    <ul id="tocify-subheader-memory-fetch-management" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="memory-fetch-management-POSTapi-memory-latest">
                        <a href="#memory-fetch-management-POSTapi-memory-latest">POST api/memory/latest</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="memory-fetch-management-POSTapi-memory-info">
                        <a href="#memory-fetch-management-POSTapi-memory-info">POST api/memory/info</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="memory-fetch-management-POSTapi-memory-search">
                        <a href="#memory-fetch-management-POSTapi-memory-search">POST api/memory/search</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="memory-fetch-management-POSTapi-memory-admin-preview">
                        <a href="#memory-fetch-management-POSTapi-memory-admin-preview">POST api/memory/admin/preview</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="memory-fetch-management-POSTapi-memory-preview">
                        <a href="#memory-fetch-management-POSTapi-memory-preview">POST api/memory/preview</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="memory-fetch-management-POSTapi-memory-delete">
                        <a href="#memory-fetch-management-POSTapi-memory-delete">POST api/memory/delete</a>
                    </li>
                                    <li class="tocify-item level-2" data-unique="memory-fetch-management-POSTapi-user-memories">
                        <a href="#memory-fetch-management-POSTapi-user-memories">POST api/user/memories</a>
                    </li>
                                                    </ul>
                            </ul>
        
                        
            </div>

            <ul class="toc-footer" id="toc-footer">
                            <li><a href="{{ route("scribe.postman") }}">View Postman collection</a></li>
                            <li><a href="{{ route("scribe.openapi") }}">View OpenAPI spec</a></li>
                            <li><a href="http://github.com/knuckleswtf/scribe">Documentation powered by Scribe ✍</a></li>
                    </ul>
        <ul class="toc-footer" id="last-updated">
        <li>Last updated: January 11 2022</li>
    </ul>
</div>

<div class="page-wrapper">
    <div class="dark-box"></div>
    <div class="content">
        <h1 id="introduction">Introduction</h1>
<p>This documentation aims to provide all the information you need to work with our API.</p>
<aside>As you scroll, you'll see code examples for working with the API in different programming languages in the dark area to the right (or as part of the content on mobile).
You can switch the language used with the tabs at the top right (or from the nav menu at the top left on mobile).</aside>
<blockquote>
<p>Base URL</p>
</blockquote>
<pre><code class="language-yaml">http://localhost</code></pre>

        <h1 id="authenticating-requests">Authenticating requests</h1>
<p>This API is not authenticated.</p>

        <h1 id="endpoints">Endpoints</h1>

    

            <h2 id="endpoints-GETapi-user">GET api/user</h2>

<p>
</p>



<span id="example-requests-GETapi-user">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/user" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/user"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-user">
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;error&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-user" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-user"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-user"></code></pre>
</span>
<span id="execution-error-GETapi-user" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-user"></code></pre>
</span>
<form id="form-GETapi-user" data-method="GET"
      data-path="api/user"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-user', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-user"
                    onclick="tryItOut('GETapi-user');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-user"
                    onclick="cancelTryOut('GETapi-user');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-user" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/user</code></b>
        </p>
                    </form>

            <h2 id="endpoints-POSTapi-login">POST api/login</h2>

<p>
</p>



<span id="example-requests-POSTapi-login">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/login" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"email\": \"adxvifzdafbvvdyjumtarrmvohaszsfanpuuxsrcibiruuujkkreficwzevtwgtlcgkqbjfhsnwuzmicjhlghqwpjsx\",
    \"password\": \"znjr\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/login"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "adxvifzdafbvvdyjumtarrmvohaszsfanpuuxsrcibiruuujkkreficwzevtwgtlcgkqbjfhsnwuzmicjhlghqwpjsx",
    "password": "znjr"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-login">
</span>
<span id="execution-results-POSTapi-login" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-login"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-login"></code></pre>
</span>
<span id="execution-error-POSTapi-login" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-login"></code></pre>
</span>
<form id="form-POSTapi-login" data-method="POST"
      data-path="api/login"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-login', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-login"
                    onclick="tryItOut('POSTapi-login');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-login"
                    onclick="cancelTryOut('POSTapi-login');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-login" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/login</code></b>
        </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="email"
               data-endpoint="POSTapi-login"
               value="adxvifzdafbvvdyjumtarrmvohaszsfanpuuxsrcibiruuujkkreficwzevtwgtlcgkqbjfhsnwuzmicjhlghqwpjsx"
               data-component="body" hidden>
    <br>
<p>Must be a valid email address. Must not be greater than 255 characters.</p>
        </p>
                <p>
            <b><code>password</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="password"
               data-endpoint="POSTapi-login"
               value="znjr"
               data-component="body" hidden>
    <br>
<p>The value format is invalid. Must be at least 6 characters.</p>
        </p>
        </form>

            <h2 id="endpoints-POSTapi-register">POST api/register</h2>

<p>
</p>



<span id="example-requests-POSTapi-register">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/register" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"email\": \"jequjnzdrgwvmyijkrdbtsfqwhniportkvfojyxejhhuetdgkzsc\",
    \"password\": \"fcki\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/register"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "jequjnzdrgwvmyijkrdbtsfqwhniportkvfojyxejhhuetdgkzsc",
    "password": "fcki"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-register">
</span>
<span id="execution-results-POSTapi-register" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-register"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-register"></code></pre>
</span>
<span id="execution-error-POSTapi-register" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-register"></code></pre>
</span>
<form id="form-POSTapi-register" data-method="POST"
      data-path="api/register"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-register', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-register"
                    onclick="tryItOut('POSTapi-register');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-register"
                    onclick="cancelTryOut('POSTapi-register');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-register" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/register</code></b>
        </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="email"
               data-endpoint="POSTapi-register"
               value="jequjnzdrgwvmyijkrdbtsfqwhniportkvfojyxejhhuetdgkzsc"
               data-component="body" hidden>
    <br>
<p>Must be a valid email address. Must not be greater than 255 characters.</p>
        </p>
                <p>
            <b><code>password</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="password"
               data-endpoint="POSTapi-register"
               value="fcki"
               data-component="body" hidden>
    <br>
<p>The value format is invalid. Must be at least 6 characters.</p>
        </p>
        </form>

            <h2 id="endpoints-POSTapi-password-reset">Reset the given user&#039;s password.</h2>

<p>
</p>



<span id="example-requests-POSTapi-password-reset">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/password/reset" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"token\": \"mafnlhjkuvonvvxaotqkqiitjwvqcclzgtbzxlosqginbazjookoterwnxrnuizyyzzhucootrdlvlzazclzfsgcerdnvsrzfxxtwnvnlvbioybklztzluocqhigfppzzjnfdteekxsownjcthgsgrbkpcshpesoxgarrarhsvuitpkinmmepbroemuvvlmcrhfgfjluwdlybrhvowuwztchsocuqsapzwe\",
    \"email\": \"eyvnaftdzdpswpdwmkrbxouhfvteuqovhdhtwxkjnmncdxlvxutfnfeltunmvyfseanwlzrgmehlomdczaiqnjcmsiogkspgaevysnwjzzsqlsdrmoitgovpenzirxohqiffr\",
    \"password\": \"hnxn\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/password/reset"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "token": "mafnlhjkuvonvvxaotqkqiitjwvqcclzgtbzxlosqginbazjookoterwnxrnuizyyzzhucootrdlvlzazclzfsgcerdnvsrzfxxtwnvnlvbioybklztzluocqhigfppzzjnfdteekxsownjcthgsgrbkpcshpesoxgarrarhsvuitpkinmmepbroemuvvlmcrhfgfjluwdlybrhvowuwztchsocuqsapzwe",
    "email": "eyvnaftdzdpswpdwmkrbxouhfvteuqovhdhtwxkjnmncdxlvxutfnfeltunmvyfseanwlzrgmehlomdczaiqnjcmsiogkspgaevysnwjzzsqlsdrmoitgovpenzirxohqiffr",
    "password": "hnxn"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-password-reset">
</span>
<span id="execution-results-POSTapi-password-reset" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-password-reset"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-password-reset"></code></pre>
</span>
<span id="execution-error-POSTapi-password-reset" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-password-reset"></code></pre>
</span>
<form id="form-POSTapi-password-reset" data-method="POST"
      data-path="api/password/reset"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-password-reset', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-password-reset"
                    onclick="tryItOut('POSTapi-password-reset');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-password-reset"
                    onclick="cancelTryOut('POSTapi-password-reset');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-password-reset" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/password/reset</code></b>
        </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>token</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="token"
               data-endpoint="POSTapi-password-reset"
               value="mafnlhjkuvonvvxaotqkqiitjwvqcclzgtbzxlosqginbazjookoterwnxrnuizyyzzhucootrdlvlzazclzfsgcerdnvsrzfxxtwnvnlvbioybklztzluocqhigfppzzjnfdteekxsownjcthgsgrbkpcshpesoxgarrarhsvuitpkinmmepbroemuvvlmcrhfgfjluwdlybrhvowuwztchsocuqsapzwe"
               data-component="body" hidden>
    <br>
<p>Must not be greater than 255 characters.</p>
        </p>
                <p>
            <b><code>email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="email"
               data-endpoint="POSTapi-password-reset"
               value="eyvnaftdzdpswpdwmkrbxouhfvteuqovhdhtwxkjnmncdxlvxutfnfeltunmvyfseanwlzrgmehlomdczaiqnjcmsiogkspgaevysnwjzzsqlsdrmoitgovpenzirxohqiffr"
               data-component="body" hidden>
    <br>
<p>Must be a valid email address. Must not be greater than 255 characters.</p>
        </p>
                <p>
            <b><code>password</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="password"
               data-endpoint="POSTapi-password-reset"
               value="hnxn"
               data-component="body" hidden>
    <br>
<p>Must be at least 8 characters.</p>
        </p>
        </form>

            <h2 id="endpoints-POSTapi-password-email">Send a reset link to the given user.</h2>

<p>
</p>



<span id="example-requests-POSTapi-password-email">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/password/email" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/password/email"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-password-email">
</span>
<span id="execution-results-POSTapi-password-email" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-password-email"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-password-email"></code></pre>
</span>
<span id="execution-error-POSTapi-password-email" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-password-email"></code></pre>
</span>
<form id="form-POSTapi-password-email" data-method="POST"
      data-path="api/password/email"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-password-email', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-password-email"
                    onclick="tryItOut('POSTapi-password-email');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-password-email"
                    onclick="cancelTryOut('POSTapi-password-email');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-password-email" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/password/email</code></b>
        </p>
                    </form>

            <h2 id="endpoints-POSTapi-social-login-facebook">POST api/social/login/facebook</h2>

<p>
</p>



<span id="example-requests-POSTapi-social-login-facebook">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/social/login/facebook" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"provider\": \"phfraxwrrjglepsfjhttaxpriwtuwhmluhtlfcqgmqjuxgnohkxspueiknlmvdprrixqjtvexmaucbfemokltczxbsjskfbaexeajiihppcisipupbqkrwwwnhtzrrzfxgyykgohotkaojqncoewsapolgxilqqdtkewnvrh\",
    \"access_token\": \"sequi\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/social/login/facebook"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "provider": "phfraxwrrjglepsfjhttaxpriwtuwhmluhtlfcqgmqjuxgnohkxspueiknlmvdprrixqjtvexmaucbfemokltczxbsjskfbaexeajiihppcisipupbqkrwwwnhtzrrzfxgyykgohotkaojqncoewsapolgxilqqdtkewnvrh",
    "access_token": "sequi"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-social-login-facebook">
</span>
<span id="execution-results-POSTapi-social-login-facebook" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-social-login-facebook"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-social-login-facebook"></code></pre>
</span>
<span id="execution-error-POSTapi-social-login-facebook" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-social-login-facebook"></code></pre>
</span>
<form id="form-POSTapi-social-login-facebook" data-method="POST"
      data-path="api/social/login/facebook"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-social-login-facebook', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-social-login-facebook"
                    onclick="tryItOut('POSTapi-social-login-facebook');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-social-login-facebook"
                    onclick="cancelTryOut('POSTapi-social-login-facebook');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-social-login-facebook" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/social/login/facebook</code></b>
        </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>provider</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="provider"
               data-endpoint="POSTapi-social-login-facebook"
               value="phfraxwrrjglepsfjhttaxpriwtuwhmluhtlfcqgmqjuxgnohkxspueiknlmvdprrixqjtvexmaucbfemokltczxbsjskfbaexeajiihppcisipupbqkrwwwnhtzrrzfxgyykgohotkaojqncoewsapolgxilqqdtkewnvrh"
               data-component="body" hidden>
    <br>
<p>Must not be greater than 255 characters.</p>
        </p>
                <p>
            <b><code>access_token</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="access_token"
               data-endpoint="POSTapi-social-login-facebook"
               value="sequi"
               data-component="body" hidden>
    <br>

        </p>
        </form>

            <h2 id="endpoints-GETapi-email-verify">GET api/email/verify</h2>

<p>
</p>



<span id="example-requests-GETapi-email-verify">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/email/verify" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"expires\": 17,
    \"hash\": \"dolorem\",
    \"signature\": \"minus\",
    \"id\": 20
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/email/verify"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "expires": 17,
    "hash": "dolorem",
    "signature": "minus",
    "id": 20
};

fetch(url, {
    method: "GET",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-email-verify">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary>
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
access-control-allow-methods: GET, POST, PUT, DELETE, OPTIONS
access-control-allow-headers: X-Requested-With, Content-Type, X-Token-Auth, Authorization
x-ratelimit-limit: 6
x-ratelimit-remaining: 5
 </code></pre>
        </details>         <pre>

<code class="language-json">{
    &quot;msg&quot;: &quot;Invalid/Expired url provided.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-email-verify" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-email-verify"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-email-verify"></code></pre>
</span>
<span id="execution-error-GETapi-email-verify" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-email-verify"></code></pre>
</span>
<form id="form-GETapi-email-verify" data-method="GET"
      data-path="api/email/verify"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-email-verify', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-email-verify"
                    onclick="tryItOut('GETapi-email-verify');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-email-verify"
                    onclick="cancelTryOut('GETapi-email-verify');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-email-verify" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/email/verify</code></b>
        </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>expires</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="expires"
               data-endpoint="GETapi-email-verify"
               value="17"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>hash</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="hash"
               data-endpoint="GETapi-email-verify"
               value="dolorem"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>signature</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="signature"
               data-endpoint="GETapi-email-verify"
               value="minus"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="id"
               data-endpoint="GETapi-email-verify"
               value="20"
               data-component="body" hidden>
    <br>

        </p>
        </form>

            <h2 id="endpoints-POSTapi-email-resend">POST api/email/resend</h2>

<p>
</p>



<span id="example-requests-POSTapi-email-resend">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/email/resend" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/email/resend"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-email-resend">
</span>
<span id="execution-results-POSTapi-email-resend" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-email-resend"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-email-resend"></code></pre>
</span>
<span id="execution-error-POSTapi-email-resend" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-email-resend"></code></pre>
</span>
<form id="form-POSTapi-email-resend" data-method="POST"
      data-path="api/email/resend"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-email-resend', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-email-resend"
                    onclick="tryItOut('POSTapi-email-resend');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-email-resend"
                    onclick="cancelTryOut('POSTapi-email-resend');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-email-resend" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/email/resend</code></b>
        </p>
                    </form>

            <h2 id="endpoints-POSTapi-logout">POST api/logout</h2>

<p>
</p>



<span id="example-requests-POSTapi-logout">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/logout" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/logout"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-logout">
</span>
<span id="execution-results-POSTapi-logout" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-logout"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-logout"></code></pre>
</span>
<span id="execution-error-POSTapi-logout" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-logout"></code></pre>
</span>
<form id="form-POSTapi-logout" data-method="POST"
      data-path="api/logout"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-logout', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-logout"
                    onclick="tryItOut('POSTapi-logout');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-logout"
                    onclick="cancelTryOut('POSTapi-logout');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-logout" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/logout</code></b>
        </p>
                    </form>

            <h2 id="endpoints-POSTapi-user-update">POST api/user/update</h2>

<p>
</p>



<span id="example-requests-POSTapi-user-update">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/user/update" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/user/update"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-user-update">
</span>
<span id="execution-results-POSTapi-user-update" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-user-update"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-user-update"></code></pre>
</span>
<span id="execution-error-POSTapi-user-update" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-user-update"></code></pre>
</span>
<form id="form-POSTapi-user-update" data-method="POST"
      data-path="api/user/update"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-user-update', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-user-update"
                    onclick="tryItOut('POSTapi-user-update');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-user-update"
                    onclick="cancelTryOut('POSTapi-user-update');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-user-update" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/user/update</code></b>
        </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>email</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="email"
               data-endpoint="POSTapi-user-update"
               value=""
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>password</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="password"
               data-endpoint="POSTapi-user-update"
               value=""
               data-component="body" hidden>
    <br>

        </p>
        </form>

        <h1 id="helpful-resources-management">Helpful Resources management</h1>

    <p>APIs for Helpful Resources</p>

            <h2 id="helpful-resources-management-POSTapi-helpful-resources">POST api/helpful-resources</h2>

<p>
</p>



<span id="example-requests-POSTapi-helpful-resources">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/helpful-resources" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/helpful-resources"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-helpful-resources">
</span>
<span id="execution-results-POSTapi-helpful-resources" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-helpful-resources"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-helpful-resources"></code></pre>
</span>
<span id="execution-error-POSTapi-helpful-resources" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-helpful-resources"></code></pre>
</span>
<form id="form-POSTapi-helpful-resources" data-method="POST"
      data-path="api/helpful-resources"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-helpful-resources', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-helpful-resources"
                    onclick="tryItOut('POSTapi-helpful-resources');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-helpful-resources"
                    onclick="cancelTryOut('POSTapi-helpful-resources');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-helpful-resources" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/helpful-resources</code></b>
        </p>
                    </form>

        <h1 id="memory-friends-management">Memory Friends management</h1>

    <p>APIs for Memory Friends</p>

            <h2 id="memory-friends-management-POSTapi-memory-friend-submit">POST api/memory/friend/submit</h2>

<p>
</p>



<span id="example-requests-POSTapi-memory-friend-submit">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/memory/friend/submit" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"relationship\": \"grfwxvnfodwbuasaevmwyamfqtueuwsjsoboiphgboulyextnxibmncwoaouvqbnalkjfyqcvbcfftcsluuiglvuvezblmdyhpadnhooieyamxfgjoenhhklezkkqryaug\",
    \"description\": \"at\",
    \"image\": \"delectus\",
    \"access_token\": \"quo\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/memory/friend/submit"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "relationship": "grfwxvnfodwbuasaevmwyamfqtueuwsjsoboiphgboulyextnxibmncwoaouvqbnalkjfyqcvbcfftcsluuiglvuvezblmdyhpadnhooieyamxfgjoenhhklezkkqryaug",
    "description": "at",
    "image": "delectus",
    "access_token": "quo"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-memory-friend-submit">
</span>
<span id="execution-results-POSTapi-memory-friend-submit" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-memory-friend-submit"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-memory-friend-submit"></code></pre>
</span>
<span id="execution-error-POSTapi-memory-friend-submit" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-memory-friend-submit"></code></pre>
</span>
<form id="form-POSTapi-memory-friend-submit" data-method="POST"
      data-path="api/memory/friend/submit"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-memory-friend-submit', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-memory-friend-submit"
                    onclick="tryItOut('POSTapi-memory-friend-submit');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-memory-friend-submit"
                    onclick="cancelTryOut('POSTapi-memory-friend-submit');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-memory-friend-submit" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/memory/friend/submit</code></b>
        </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>relationship</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="relationship"
               data-endpoint="POSTapi-memory-friend-submit"
               value="grfwxvnfodwbuasaevmwyamfqtueuwsjsoboiphgboulyextnxibmncwoaouvqbnalkjfyqcvbcfftcsluuiglvuvezblmdyhpadnhooieyamxfgjoenhhklezkkqryaug"
               data-component="body" hidden>
    <br>
<p>Must not be greater than 255 characters.</p>
        </p>
                <p>
            <b><code>description</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="description"
               data-endpoint="POSTapi-memory-friend-submit"
               value="at"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>image</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="image"
               data-endpoint="POSTapi-memory-friend-submit"
               value="delectus"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>access_token</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="access_token"
               data-endpoint="POSTapi-memory-friend-submit"
               value="quo"
               data-component="body" hidden>
    <br>

        </p>
        </form>

            <h2 id="memory-friends-management-POSTapi-memory-friend-review">POST api/memory/friend/review</h2>

<p>
</p>



<span id="example-requests-POSTapi-memory-friend-review">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/memory/friend/review" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"access_token\": \"quos\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/memory/friend/review"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "access_token": "quos"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-memory-friend-review">
</span>
<span id="execution-results-POSTapi-memory-friend-review" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-memory-friend-review"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-memory-friend-review"></code></pre>
</span>
<span id="execution-error-POSTapi-memory-friend-review" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-memory-friend-review"></code></pre>
</span>
<form id="form-POSTapi-memory-friend-review" data-method="POST"
      data-path="api/memory/friend/review"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-memory-friend-review', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-memory-friend-review"
                    onclick="tryItOut('POSTapi-memory-friend-review');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-memory-friend-review"
                    onclick="cancelTryOut('POSTapi-memory-friend-review');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-memory-friend-review" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/memory/friend/review</code></b>
        </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>access_token</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="access_token"
               data-endpoint="POSTapi-memory-friend-review"
               value="quos"
               data-component="body" hidden>
    <br>

        </p>
        </form>

            <h2 id="memory-friends-management-POSTapi-memory-friend-approve">POST api/memory/friend/approve</h2>

<p>
</p>



<span id="example-requests-POSTapi-memory-friend-approve">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/memory/friend/approve" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"access_token\": \"architecto\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/memory/friend/approve"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "access_token": "architecto"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-memory-friend-approve">
</span>
<span id="execution-results-POSTapi-memory-friend-approve" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-memory-friend-approve"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-memory-friend-approve"></code></pre>
</span>
<span id="execution-error-POSTapi-memory-friend-approve" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-memory-friend-approve"></code></pre>
</span>
<form id="form-POSTapi-memory-friend-approve" data-method="POST"
      data-path="api/memory/friend/approve"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-memory-friend-approve', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-memory-friend-approve"
                    onclick="tryItOut('POSTapi-memory-friend-approve');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-memory-friend-approve"
                    onclick="cancelTryOut('POSTapi-memory-friend-approve');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-memory-friend-approve" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/memory/friend/approve</code></b>
        </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>access_token</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="access_token"
               data-endpoint="POSTapi-memory-friend-approve"
               value="architecto"
               data-component="body" hidden>
    <br>

        </p>
        </form>

            <h2 id="memory-friends-management-POSTapi-memory-friend-delete">POST api/memory/friend/delete</h2>

<p>
</p>



<span id="example-requests-POSTapi-memory-friend-delete">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/memory/friend/delete" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"access_token\": \"est\",
    \"memory_access_token\": \"doloribus\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/memory/friend/delete"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "access_token": "est",
    "memory_access_token": "doloribus"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-memory-friend-delete">
</span>
<span id="execution-results-POSTapi-memory-friend-delete" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-memory-friend-delete"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-memory-friend-delete"></code></pre>
</span>
<span id="execution-error-POSTapi-memory-friend-delete" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-memory-friend-delete"></code></pre>
</span>
<form id="form-POSTapi-memory-friend-delete" data-method="POST"
      data-path="api/memory/friend/delete"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-memory-friend-delete', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-memory-friend-delete"
                    onclick="tryItOut('POSTapi-memory-friend-delete');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-memory-friend-delete"
                    onclick="cancelTryOut('POSTapi-memory-friend-delete');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-memory-friend-delete" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/memory/friend/delete</code></b>
        </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>access_token</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="access_token"
               data-endpoint="POSTapi-memory-friend-delete"
               value="est"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>memory_access_token</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="memory_access_token"
               data-endpoint="POSTapi-memory-friend-delete"
               value="doloribus"
               data-component="body" hidden>
    <br>

        </p>
        </form>

            <h2 id="memory-friends-management-POSTapi-memory-add-invite-friends">POST api/memory/add/invite/friends</h2>

<p>
</p>



<span id="example-requests-POSTapi-memory-add-invite-friends">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/memory/add/invite/friends" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"friends\": [
        {
            \"email\": \"weissnat.christy@example.com\"
        }
    ]
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/memory/add/invite/friends"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "friends": [
        {
            "email": "weissnat.christy@example.com"
        }
    ]
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-memory-add-invite-friends">
</span>
<span id="execution-results-POSTapi-memory-add-invite-friends" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-memory-add-invite-friends"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-memory-add-invite-friends"></code></pre>
</span>
<span id="execution-error-POSTapi-memory-add-invite-friends" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-memory-add-invite-friends"></code></pre>
</span>
<form id="form-POSTapi-memory-add-invite-friends" data-method="POST"
      data-path="api/memory/add/invite/friends"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-memory-add-invite-friends', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-memory-add-invite-friends"
                    onclick="tryItOut('POSTapi-memory-add-invite-friends');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-memory-add-invite-friends"
                    onclick="cancelTryOut('POSTapi-memory-add-invite-friends');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-memory-add-invite-friends" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/memory/add/invite/friends</code></b>
        </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
        <details>
            <summary style="padding-bottom: 10px;">
                <b><code>friends</code></b>&nbsp;&nbsp;<small>object[]</small>  &nbsp;
<br>
<p>Must have at least 1 items.</p>
            </summary>
                                                <p>
                        <b><code>friends[].email</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="friends.0.email"
               data-endpoint="POSTapi-memory-add-invite-friends"
               value="weissnat.christy@example.com"
               data-component="body" hidden>
    <br>
<p>Must be a valid email address.</p>
                    </p>
                                    </details>
        </p>
        </form>

        <h1 id="memory-media-upload-management">Memory Media upload management</h1>

    <p>APIs for Memory Media upload</p>

            <h2 id="memory-media-upload-management-POSTapi-memory-add-cover">POST api/memory/add/cover</h2>

<p>
</p>



<span id="example-requests-POSTapi-memory-add-cover">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/memory/add/cover" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"memory_access_token\": \"ea\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/memory/add/cover"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "memory_access_token": "ea"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-memory-add-cover">
</span>
<span id="execution-results-POSTapi-memory-add-cover" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-memory-add-cover"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-memory-add-cover"></code></pre>
</span>
<span id="execution-error-POSTapi-memory-add-cover" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-memory-add-cover"></code></pre>
</span>
<form id="form-POSTapi-memory-add-cover" data-method="POST"
      data-path="api/memory/add/cover"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-memory-add-cover', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-memory-add-cover"
                    onclick="tryItOut('POSTapi-memory-add-cover');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-memory-add-cover"
                    onclick="cancelTryOut('POSTapi-memory-add-cover');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-memory-add-cover" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/memory/add/cover</code></b>
        </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>memory_access_token</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="memory_access_token"
               data-endpoint="POSTapi-memory-add-cover"
               value="ea"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>image</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="image"
               data-endpoint="POSTapi-memory-add-cover"
               value=""
               data-component="body" hidden>
    <br>

        </p>
        </form>

            <h2 id="memory-media-upload-management-POSTapi-memory-add-image">POST api/memory/add/image</h2>

<p>
</p>



<span id="example-requests-POSTapi-memory-add-image">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/memory/add/image" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"memory_access_token\": \"est\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/memory/add/image"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "memory_access_token": "est"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-memory-add-image">
</span>
<span id="execution-results-POSTapi-memory-add-image" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-memory-add-image"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-memory-add-image"></code></pre>
</span>
<span id="execution-error-POSTapi-memory-add-image" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-memory-add-image"></code></pre>
</span>
<form id="form-POSTapi-memory-add-image" data-method="POST"
      data-path="api/memory/add/image"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-memory-add-image', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-memory-add-image"
                    onclick="tryItOut('POSTapi-memory-add-image');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-memory-add-image"
                    onclick="cancelTryOut('POSTapi-memory-add-image');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-memory-add-image" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/memory/add/image</code></b>
        </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>memory_access_token</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="memory_access_token"
               data-endpoint="POSTapi-memory-add-image"
               value="est"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>image</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="image"
               data-endpoint="POSTapi-memory-add-image"
               value=""
               data-component="body" hidden>
    <br>

        </p>
        </form>

            <h2 id="memory-media-upload-management-POSTapi-memory-add-video">POST api/memory/add/video</h2>

<p>
</p>



<span id="example-requests-POSTapi-memory-add-video">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/memory/add/video" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"memory_access_token\": \"aut\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/memory/add/video"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "memory_access_token": "aut"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-memory-add-video">
</span>
<span id="execution-results-POSTapi-memory-add-video" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-memory-add-video"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-memory-add-video"></code></pre>
</span>
<span id="execution-error-POSTapi-memory-add-video" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-memory-add-video"></code></pre>
</span>
<form id="form-POSTapi-memory-add-video" data-method="POST"
      data-path="api/memory/add/video"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-memory-add-video', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-memory-add-video"
                    onclick="tryItOut('POSTapi-memory-add-video');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-memory-add-video"
                    onclick="cancelTryOut('POSTapi-memory-add-video');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-memory-add-video" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/memory/add/video</code></b>
        </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>memory_access_token</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="memory_access_token"
               data-endpoint="POSTapi-memory-add-video"
               value="aut"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>video</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="video"
               data-endpoint="POSTapi-memory-add-video"
               value=""
               data-component="body" hidden>
    <br>

        </p>
        </form>

            <h2 id="memory-media-upload-management-POSTapi-memory-delete-cover">POST api/memory/delete/cover</h2>

<p>
</p>



<span id="example-requests-POSTapi-memory-delete-cover">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/memory/delete/cover" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"memory_access_token\": \"eum\",
    \"image\": \"eos\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/memory/delete/cover"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "memory_access_token": "eum",
    "image": "eos"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-memory-delete-cover">
</span>
<span id="execution-results-POSTapi-memory-delete-cover" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-memory-delete-cover"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-memory-delete-cover"></code></pre>
</span>
<span id="execution-error-POSTapi-memory-delete-cover" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-memory-delete-cover"></code></pre>
</span>
<form id="form-POSTapi-memory-delete-cover" data-method="POST"
      data-path="api/memory/delete/cover"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-memory-delete-cover', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-memory-delete-cover"
                    onclick="tryItOut('POSTapi-memory-delete-cover');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-memory-delete-cover"
                    onclick="cancelTryOut('POSTapi-memory-delete-cover');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-memory-delete-cover" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/memory/delete/cover</code></b>
        </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>memory_access_token</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="memory_access_token"
               data-endpoint="POSTapi-memory-delete-cover"
               value="eum"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>image</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="image"
               data-endpoint="POSTapi-memory-delete-cover"
               value="eos"
               data-component="body" hidden>
    <br>

        </p>
        </form>

            <h2 id="memory-media-upload-management-POSTapi-memory-delete-image">POST api/memory/delete/image</h2>

<p>
</p>



<span id="example-requests-POSTapi-memory-delete-image">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/memory/delete/image" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"memory_access_token\": \"maxime\",
    \"image\": \"iure\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/memory/delete/image"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "memory_access_token": "maxime",
    "image": "iure"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-memory-delete-image">
</span>
<span id="execution-results-POSTapi-memory-delete-image" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-memory-delete-image"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-memory-delete-image"></code></pre>
</span>
<span id="execution-error-POSTapi-memory-delete-image" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-memory-delete-image"></code></pre>
</span>
<form id="form-POSTapi-memory-delete-image" data-method="POST"
      data-path="api/memory/delete/image"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-memory-delete-image', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-memory-delete-image"
                    onclick="tryItOut('POSTapi-memory-delete-image');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-memory-delete-image"
                    onclick="cancelTryOut('POSTapi-memory-delete-image');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-memory-delete-image" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/memory/delete/image</code></b>
        </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>memory_access_token</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="memory_access_token"
               data-endpoint="POSTapi-memory-delete-image"
               value="maxime"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>image</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="image"
               data-endpoint="POSTapi-memory-delete-image"
               value="iure"
               data-component="body" hidden>
    <br>

        </p>
        </form>

            <h2 id="memory-media-upload-management-POSTapi-memory-delete-video">POST api/memory/delete/video</h2>

<p>
</p>



<span id="example-requests-POSTapi-memory-delete-video">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/memory/delete/video" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"memory_access_token\": \"nostrum\",
    \"video\": \"omnis\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/memory/delete/video"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "memory_access_token": "nostrum",
    "video": "omnis"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-memory-delete-video">
</span>
<span id="execution-results-POSTapi-memory-delete-video" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-memory-delete-video"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-memory-delete-video"></code></pre>
</span>
<span id="execution-error-POSTapi-memory-delete-video" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-memory-delete-video"></code></pre>
</span>
<form id="form-POSTapi-memory-delete-video" data-method="POST"
      data-path="api/memory/delete/video"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-memory-delete-video', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-memory-delete-video"
                    onclick="tryItOut('POSTapi-memory-delete-video');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-memory-delete-video"
                    onclick="cancelTryOut('POSTapi-memory-delete-video');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-memory-delete-video" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/memory/delete/video</code></b>
        </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>memory_access_token</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="memory_access_token"
               data-endpoint="POSTapi-memory-delete-video"
               value="nostrum"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>video</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="video"
               data-endpoint="POSTapi-memory-delete-video"
               value="omnis"
               data-component="body" hidden>
    <br>

        </p>
        </form>

        <h1 id="memory-notifications-management">Memory Notifications management</h1>

    <p>APIs for Memory Notifications</p>

            <h2 id="memory-notifications-management-POSTapi-user-notifications-all-read">POST api/user/notifications/all/read</h2>

<p>
</p>



<span id="example-requests-POSTapi-user-notifications-all-read">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/user/notifications/all/read" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/user/notifications/all/read"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-user-notifications-all-read">
</span>
<span id="execution-results-POSTapi-user-notifications-all-read" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-user-notifications-all-read"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-user-notifications-all-read"></code></pre>
</span>
<span id="execution-error-POSTapi-user-notifications-all-read" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-user-notifications-all-read"></code></pre>
</span>
<form id="form-POSTapi-user-notifications-all-read" data-method="POST"
      data-path="api/user/notifications/all/read"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-user-notifications-all-read', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-user-notifications-all-read"
                    onclick="tryItOut('POSTapi-user-notifications-all-read');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-user-notifications-all-read"
                    onclick="cancelTryOut('POSTapi-user-notifications-all-read');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-user-notifications-all-read" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/user/notifications/all/read</code></b>
        </p>
                    </form>

            <h2 id="memory-notifications-management-POSTapi-memory-notifications">POST api/memory/notifications</h2>

<p>
</p>



<span id="example-requests-POSTapi-memory-notifications">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/memory/notifications" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/memory/notifications"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-memory-notifications">
</span>
<span id="execution-results-POSTapi-memory-notifications" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-memory-notifications"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-memory-notifications"></code></pre>
</span>
<span id="execution-error-POSTapi-memory-notifications" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-memory-notifications"></code></pre>
</span>
<form id="form-POSTapi-memory-notifications" data-method="POST"
      data-path="api/memory/notifications"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-memory-notifications', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-memory-notifications"
                    onclick="tryItOut('POSTapi-memory-notifications');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-memory-notifications"
                    onclick="cancelTryOut('POSTapi-memory-notifications');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-memory-notifications" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/memory/notifications</code></b>
        </p>
                    </form>

            <h2 id="memory-notifications-management-POSTapi-memory-notification-read">POST api/memory/notification/read</h2>

<p>
</p>



<span id="example-requests-POSTapi-memory-notification-read">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/memory/notification/read" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"id\": 7
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/memory/notification/read"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "id": 7
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-memory-notification-read">
</span>
<span id="execution-results-POSTapi-memory-notification-read" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-memory-notification-read"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-memory-notification-read"></code></pre>
</span>
<span id="execution-error-POSTapi-memory-notification-read" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-memory-notification-read"></code></pre>
</span>
<form id="form-POSTapi-memory-notification-read" data-method="POST"
      data-path="api/memory/notification/read"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-memory-notification-read', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-memory-notification-read"
                    onclick="tryItOut('POSTapi-memory-notification-read');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-memory-notification-read"
                    onclick="cancelTryOut('POSTapi-memory-notification-read');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-memory-notification-read" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/memory/notification/read</code></b>
        </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
                <input type="number"
               name="id"
               data-endpoint="POSTapi-memory-notification-read"
               value="7"
               data-component="body" hidden>
    <br>

        </p>
        </form>

            <h2 id="memory-notifications-management-POSTapi-memory-notifications-all-read">POST api/memory/notifications/all/read</h2>

<p>
</p>



<span id="example-requests-POSTapi-memory-notifications-all-read">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/memory/notifications/all/read" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"access_token\": \"voluptate\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/memory/notifications/all/read"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "access_token": "voluptate"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-memory-notifications-all-read">
</span>
<span id="execution-results-POSTapi-memory-notifications-all-read" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-memory-notifications-all-read"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-memory-notifications-all-read"></code></pre>
</span>
<span id="execution-error-POSTapi-memory-notifications-all-read" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-memory-notifications-all-read"></code></pre>
</span>
<form id="form-POSTapi-memory-notifications-all-read" data-method="POST"
      data-path="api/memory/notifications/all/read"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-memory-notifications-all-read', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-memory-notifications-all-read"
                    onclick="tryItOut('POSTapi-memory-notifications-all-read');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-memory-notifications-all-read"
                    onclick="cancelTryOut('POSTapi-memory-notifications-all-read');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-memory-notifications-all-read" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/memory/notifications/all/read</code></b>
        </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>access_token</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="access_token"
               data-endpoint="POSTapi-memory-notifications-all-read"
               value="voluptate"
               data-component="body" hidden>
    <br>

        </p>
        </form>

        <h1 id="memory-create-management">Memory create management</h1>

    <p>APIs for Memory create</p>

            <h2 id="memory-create-management-POSTapi-memory-add">POST api/memory/add</h2>

<p>
</p>



<span id="example-requests-POSTapi-memory-add">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/memory/add" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"tfibcygnjflwdnzbtxxjrpzqptzbzomgughxgqswnrvygbagwpwelkoehbtxrhnjmavlgxamzeuaxhcysjtixaqisuvelqtipihtxmxprehwiyyonktvgdgeibdckftwwopiwmgeqmpocafmtweqvrhz\",
    \"loving\": \"smunytugiopackwnznenhruhnwjogvxlkmnbbuyzubghiwqeppbjrwcltwfnwngwljjrjfvvcyldiatcuskuabvgnmutibewaokrgeqypmfebazflztpidkkbzbrwdkj\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/memory/add"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "tfibcygnjflwdnzbtxxjrpzqptzbzomgughxgqswnrvygbagwpwelkoehbtxrhnjmavlgxamzeuaxhcysjtixaqisuvelqtipihtxmxprehwiyyonktvgdgeibdckftwwopiwmgeqmpocafmtweqvrhz",
    "loving": "smunytugiopackwnznenhruhnwjogvxlkmnbbuyzubghiwqeppbjrwcltwfnwngwljjrjfvvcyldiatcuskuabvgnmutibewaokrgeqypmfebazflztpidkkbzbrwdkj"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-memory-add">
</span>
<span id="execution-results-POSTapi-memory-add" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-memory-add"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-memory-add"></code></pre>
</span>
<span id="execution-error-POSTapi-memory-add" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-memory-add"></code></pre>
</span>
<form id="form-POSTapi-memory-add" data-method="POST"
      data-path="api/memory/add"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-memory-add', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-memory-add"
                    onclick="tryItOut('POSTapi-memory-add');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-memory-add"
                    onclick="cancelTryOut('POSTapi-memory-add');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-memory-add" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/memory/add</code></b>
        </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>name</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="name"
               data-endpoint="POSTapi-memory-add"
               value="tfibcygnjflwdnzbtxxjrpzqptzbzomgughxgqswnrvygbagwpwelkoehbtxrhnjmavlgxamzeuaxhcysjtixaqisuvelqtipihtxmxprehwiyyonktvgdgeibdckftwwopiwmgeqmpocafmtweqvrhz"
               data-component="body" hidden>
    <br>
<p>Must not be greater than 255 characters.</p>
        </p>
                <p>
            <b><code>loving</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="loving"
               data-endpoint="POSTapi-memory-add"
               value="smunytugiopackwnznenhruhnwjogvxlkmnbbuyzubghiwqeppbjrwcltwfnwngwljjrjfvvcyldiatcuskuabvgnmutibewaokrgeqypmfebazflztpidkkbzbrwdkj"
               data-component="body" hidden>
    <br>
<p>Must not be greater than 255 characters.</p>
        </p>
        </form>

            <h2 id="memory-create-management-POSTapi-memory-add-description">POST api/memory/add/description</h2>

<p>
</p>



<span id="example-requests-POSTapi-memory-add-description">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/memory/add/description" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"memory_access_token\": \"qui\",
    \"description\": \"a\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/memory/add/description"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "memory_access_token": "qui",
    "description": "a"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-memory-add-description">
</span>
<span id="execution-results-POSTapi-memory-add-description" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-memory-add-description"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-memory-add-description"></code></pre>
</span>
<span id="execution-error-POSTapi-memory-add-description" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-memory-add-description"></code></pre>
</span>
<form id="form-POSTapi-memory-add-description" data-method="POST"
      data-path="api/memory/add/description"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-memory-add-description', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-memory-add-description"
                    onclick="tryItOut('POSTapi-memory-add-description');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-memory-add-description"
                    onclick="cancelTryOut('POSTapi-memory-add-description');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-memory-add-description" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/memory/add/description</code></b>
        </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>memory_access_token</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="memory_access_token"
               data-endpoint="POSTapi-memory-add-description"
               value="qui"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>description</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="description"
               data-endpoint="POSTapi-memory-add-description"
               value="a"
               data-component="body" hidden>
    <br>

        </p>
        </form>

            <h2 id="memory-create-management-POSTapi-memory-add-favorite-memory">POST api/memory/add/favorite-memory</h2>

<p>
</p>



<span id="example-requests-POSTapi-memory-add-favorite-memory">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/memory/add/favorite-memory" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"favorites\": [
        null
    ]
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/memory/add/favorite-memory"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "favorites": [
        null
    ]
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-memory-add-favorite-memory">
</span>
<span id="execution-results-POSTapi-memory-add-favorite-memory" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-memory-add-favorite-memory"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-memory-add-favorite-memory"></code></pre>
</span>
<span id="execution-error-POSTapi-memory-add-favorite-memory" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-memory-add-favorite-memory"></code></pre>
</span>
<form id="form-POSTapi-memory-add-favorite-memory" data-method="POST"
      data-path="api/memory/add/favorite-memory"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-memory-add-favorite-memory', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-memory-add-favorite-memory"
                    onclick="tryItOut('POSTapi-memory-add-favorite-memory');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-memory-add-favorite-memory"
                    onclick="cancelTryOut('POSTapi-memory-add-favorite-memory');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-memory-add-favorite-memory" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/memory/add/favorite-memory</code></b>
        </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>favorites</code></b>&nbsp;&nbsp;<small>string[][]</small>  &nbsp;
                <input type="text"
               name="favorites.0.0"
               data-endpoint="POSTapi-memory-add-favorite-memory"
               data-component="body" hidden>
        <input type="text"
               name="favorites.0.1"
               data-endpoint="POSTapi-memory-add-favorite-memory"
               data-component="body" hidden>
    <br>
<p>Must have at least 2 items.</p>
        </p>
        </form>

            <h2 id="memory-create-management-POSTapi-memory-add-special-dates">POST api/memory/add/special-dates</h2>

<p>
</p>



<span id="example-requests-POSTapi-memory-add-special-dates">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/memory/add/special-dates" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"special_dates\": [
        {
            \"date\": \"2022-01-11\"
        }
    ],
    \"memory_reminder\": false,
    \"memory_access_token\": \"reiciendis\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/memory/add/special-dates"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "special_dates": [
        {
            "date": "2022-01-11"
        }
    ],
    "memory_reminder": false,
    "memory_access_token": "reiciendis"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-memory-add-special-dates">
</span>
<span id="execution-results-POSTapi-memory-add-special-dates" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-memory-add-special-dates"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-memory-add-special-dates"></code></pre>
</span>
<span id="execution-error-POSTapi-memory-add-special-dates" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-memory-add-special-dates"></code></pre>
</span>
<form id="form-POSTapi-memory-add-special-dates" data-method="POST"
      data-path="api/memory/add/special-dates"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-memory-add-special-dates', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-memory-add-special-dates"
                    onclick="tryItOut('POSTapi-memory-add-special-dates');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-memory-add-special-dates"
                    onclick="cancelTryOut('POSTapi-memory-add-special-dates');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-memory-add-special-dates" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/memory/add/special-dates</code></b>
        </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
        <details>
            <summary style="padding-bottom: 10px;">
                <b><code>special_dates</code></b>&nbsp;&nbsp;<small>object[]</small>  &nbsp;
<br>
<p>Must have at least 2 items.</p>
            </summary>
                                                <p>
                        <b><code>special_dates[].date</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="special_dates.0.date"
               data-endpoint="POSTapi-memory-add-special-dates"
               value="2022-01-11"
               data-component="body" hidden>
    <br>
<p>Must be a valid date. Must be a valid date in the format <code>Y-m-d</code>.</p>
                    </p>
                                    </details>
        </p>
                <p>
            <b><code>memory_reminder</code></b>&nbsp;&nbsp;<small>boolean</small>     <i>optional</i> &nbsp;
                <label data-endpoint="POSTapi-memory-add-special-dates" hidden>
            <input type="radio" name="memory_reminder"
                   value="true"
                   data-endpoint="POSTapi-memory-add-special-dates"
                   data-component="body"
            >
            <code>true</code>
        </label>
        <label data-endpoint="POSTapi-memory-add-special-dates" hidden>
            <input type="radio" name="memory_reminder"
                   value="false"
                   data-endpoint="POSTapi-memory-add-special-dates"
                   data-component="body"
            >
            <code>false</code>
        </label>
    <br>

        </p>
                <p>
            <b><code>memory_access_token</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="memory_access_token"
               data-endpoint="POSTapi-memory-add-special-dates"
               value="reiciendis"
               data-component="body" hidden>
    <br>

        </p>
        </form>

            <h2 id="memory-create-management-POSTapi-memory-add-theme">POST api/memory/add/theme</h2>

<p>
</p>



<span id="example-requests-POSTapi-memory-add-theme">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/memory/add/theme" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"memory_access_token\": \"vel\",
    \"theme_color\": \"omnis\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/memory/add/theme"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "memory_access_token": "vel",
    "theme_color": "omnis"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-memory-add-theme">
</span>
<span id="execution-results-POSTapi-memory-add-theme" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-memory-add-theme"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-memory-add-theme"></code></pre>
</span>
<span id="execution-error-POSTapi-memory-add-theme" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-memory-add-theme"></code></pre>
</span>
<form id="form-POSTapi-memory-add-theme" data-method="POST"
      data-path="api/memory/add/theme"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-memory-add-theme', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-memory-add-theme"
                    onclick="tryItOut('POSTapi-memory-add-theme');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-memory-add-theme"
                    onclick="cancelTryOut('POSTapi-memory-add-theme');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-memory-add-theme" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/memory/add/theme</code></b>
        </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>memory_access_token</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="memory_access_token"
               data-endpoint="POSTapi-memory-add-theme"
               value="vel"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>theme_color</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="theme_color"
               data-endpoint="POSTapi-memory-add-theme"
               value="omnis"
               data-component="body" hidden>
    <br>

        </p>
        </form>

            <h2 id="memory-create-management-POSTapi-memory-add-visibility">POST api/memory/add/visibility</h2>

<p>
</p>



<span id="example-requests-POSTapi-memory-add-visibility">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/memory/add/visibility" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"memory_access_token\": \"sunt\",
    \"visibility\": \"private\",
    \"memory_reminder\": false,
    \"receive_afsp_resources\": true,
    \"invites\": [
        \"temporibus\"
    ]
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/memory/add/visibility"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "memory_access_token": "sunt",
    "visibility": "private",
    "memory_reminder": false,
    "receive_afsp_resources": true,
    "invites": [
        "temporibus"
    ]
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-memory-add-visibility">
</span>
<span id="execution-results-POSTapi-memory-add-visibility" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-memory-add-visibility"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-memory-add-visibility"></code></pre>
</span>
<span id="execution-error-POSTapi-memory-add-visibility" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-memory-add-visibility"></code></pre>
</span>
<form id="form-POSTapi-memory-add-visibility" data-method="POST"
      data-path="api/memory/add/visibility"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-memory-add-visibility', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-memory-add-visibility"
                    onclick="tryItOut('POSTapi-memory-add-visibility');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-memory-add-visibility"
                    onclick="cancelTryOut('POSTapi-memory-add-visibility');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-memory-add-visibility" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/memory/add/visibility</code></b>
        </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>memory_access_token</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="memory_access_token"
               data-endpoint="POSTapi-memory-add-visibility"
               value="sunt"
               data-component="body" hidden>
    <br>

        </p>
                <p>
            <b><code>visibility</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="visibility"
               data-endpoint="POSTapi-memory-add-visibility"
               value="private"
               data-component="body" hidden>
    <br>
<p>Must be one of <code>public</code> or <code>private</code>.</p>
        </p>
                <p>
            <b><code>memory_reminder</code></b>&nbsp;&nbsp;<small>boolean</small>     <i>optional</i> &nbsp;
                <label data-endpoint="POSTapi-memory-add-visibility" hidden>
            <input type="radio" name="memory_reminder"
                   value="true"
                   data-endpoint="POSTapi-memory-add-visibility"
                   data-component="body"
            >
            <code>true</code>
        </label>
        <label data-endpoint="POSTapi-memory-add-visibility" hidden>
            <input type="radio" name="memory_reminder"
                   value="false"
                   data-endpoint="POSTapi-memory-add-visibility"
                   data-component="body"
            >
            <code>false</code>
        </label>
    <br>

        </p>
                <p>
            <b><code>receive_afsp_resources</code></b>&nbsp;&nbsp;<small>boolean</small>     <i>optional</i> &nbsp;
                <label data-endpoint="POSTapi-memory-add-visibility" hidden>
            <input type="radio" name="receive_afsp_resources"
                   value="true"
                   data-endpoint="POSTapi-memory-add-visibility"
                   data-component="body"
            >
            <code>true</code>
        </label>
        <label data-endpoint="POSTapi-memory-add-visibility" hidden>
            <input type="radio" name="receive_afsp_resources"
                   value="false"
                   data-endpoint="POSTapi-memory-add-visibility"
                   data-component="body"
            >
            <code>false</code>
        </label>
    <br>

        </p>
                <p>
            <b><code>invites</code></b>&nbsp;&nbsp;<small>string[]</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="invites.0"
               data-endpoint="POSTapi-memory-add-visibility"
               data-component="body" hidden>
        <input type="text"
               name="invites.1"
               data-endpoint="POSTapi-memory-add-visibility"
               data-component="body" hidden>
    <br>
<p>This field is required when <code>visibility</code> is <code>private</code>.</p>
        </p>
        </form>

            <h2 id="memory-create-management-POSTapi-memory-add-submit">POST api/memory/add/submit</h2>

<p>
</p>



<span id="example-requests-POSTapi-memory-add-submit">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/memory/add/submit" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"memory_access_token\": \"iste\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/memory/add/submit"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "memory_access_token": "iste"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-memory-add-submit">
</span>
<span id="execution-results-POSTapi-memory-add-submit" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-memory-add-submit"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-memory-add-submit"></code></pre>
</span>
<span id="execution-error-POSTapi-memory-add-submit" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-memory-add-submit"></code></pre>
</span>
<form id="form-POSTapi-memory-add-submit" data-method="POST"
      data-path="api/memory/add/submit"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-memory-add-submit', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-memory-add-submit"
                    onclick="tryItOut('POSTapi-memory-add-submit');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-memory-add-submit"
                    onclick="cancelTryOut('POSTapi-memory-add-submit');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-memory-add-submit" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/memory/add/submit</code></b>
        </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>memory_access_token</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="memory_access_token"
               data-endpoint="POSTapi-memory-add-submit"
               value="iste"
               data-component="body" hidden>
    <br>

        </p>
        </form>

        <h1 id="memory-fetch-management">Memory fetch management</h1>

    <p>APIs for Memory fetch</p>

            <h2 id="memory-fetch-management-POSTapi-memory-latest">POST api/memory/latest</h2>

<p>
</p>



<span id="example-requests-POSTapi-memory-latest">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/memory/latest" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/memory/latest"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-memory-latest">
</span>
<span id="execution-results-POSTapi-memory-latest" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-memory-latest"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-memory-latest"></code></pre>
</span>
<span id="execution-error-POSTapi-memory-latest" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-memory-latest"></code></pre>
</span>
<form id="form-POSTapi-memory-latest" data-method="POST"
      data-path="api/memory/latest"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-memory-latest', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-memory-latest"
                    onclick="tryItOut('POSTapi-memory-latest');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-memory-latest"
                    onclick="cancelTryOut('POSTapi-memory-latest');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-memory-latest" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/memory/latest</code></b>
        </p>
                    </form>

            <h2 id="memory-fetch-management-POSTapi-memory-info">POST api/memory/info</h2>

<p>
</p>



<span id="example-requests-POSTapi-memory-info">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/memory/info" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/memory/info"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-memory-info">
</span>
<span id="execution-results-POSTapi-memory-info" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-memory-info"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-memory-info"></code></pre>
</span>
<span id="execution-error-POSTapi-memory-info" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-memory-info"></code></pre>
</span>
<form id="form-POSTapi-memory-info" data-method="POST"
      data-path="api/memory/info"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-memory-info', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-memory-info"
                    onclick="tryItOut('POSTapi-memory-info');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-memory-info"
                    onclick="cancelTryOut('POSTapi-memory-info');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-memory-info" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/memory/info</code></b>
        </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>access_token</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="access_token"
               data-endpoint="POSTapi-memory-info"
               value=""
               data-component="body" hidden>
    <br>
<p>This field is required when <code>private_access_token</code> is not present.</p>
        </p>
                <p>
            <b><code>private_access_token</code></b>&nbsp;&nbsp;<small>string</small>     <i>optional</i> &nbsp;
                <input type="text"
               name="private_access_token"
               data-endpoint="POSTapi-memory-info"
               value=""
               data-component="body" hidden>
    <br>
<p>This field is required when <code>access_token</code> is not present.</p>
        </p>
        </form>

            <h2 id="memory-fetch-management-POSTapi-memory-search">POST api/memory/search</h2>

<p>
</p>



<span id="example-requests-POSTapi-memory-search">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/memory/search" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"s\": \"et\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/memory/search"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "s": "et"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-memory-search">
</span>
<span id="execution-results-POSTapi-memory-search" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-memory-search"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-memory-search"></code></pre>
</span>
<span id="execution-error-POSTapi-memory-search" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-memory-search"></code></pre>
</span>
<form id="form-POSTapi-memory-search" data-method="POST"
      data-path="api/memory/search"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-memory-search', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-memory-search"
                    onclick="tryItOut('POSTapi-memory-search');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-memory-search"
                    onclick="cancelTryOut('POSTapi-memory-search');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-memory-search" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/memory/search</code></b>
        </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>s</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="s"
               data-endpoint="POSTapi-memory-search"
               value="et"
               data-component="body" hidden>
    <br>

        </p>
        </form>

            <h2 id="memory-fetch-management-POSTapi-memory-admin-preview">POST api/memory/admin/preview</h2>

<p>
</p>



<span id="example-requests-POSTapi-memory-admin-preview">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/memory/admin/preview" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"access_token\": \"corporis\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/memory/admin/preview"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "access_token": "corporis"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-memory-admin-preview">
</span>
<span id="execution-results-POSTapi-memory-admin-preview" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-memory-admin-preview"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-memory-admin-preview"></code></pre>
</span>
<span id="execution-error-POSTapi-memory-admin-preview" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-memory-admin-preview"></code></pre>
</span>
<form id="form-POSTapi-memory-admin-preview" data-method="POST"
      data-path="api/memory/admin/preview"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-memory-admin-preview', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-memory-admin-preview"
                    onclick="tryItOut('POSTapi-memory-admin-preview');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-memory-admin-preview"
                    onclick="cancelTryOut('POSTapi-memory-admin-preview');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-memory-admin-preview" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/memory/admin/preview</code></b>
        </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>access_token</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="access_token"
               data-endpoint="POSTapi-memory-admin-preview"
               value="corporis"
               data-component="body" hidden>
    <br>

        </p>
        </form>

            <h2 id="memory-fetch-management-POSTapi-memory-preview">POST api/memory/preview</h2>

<p>
</p>



<span id="example-requests-POSTapi-memory-preview">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/memory/preview" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"access_token\": \"numquam\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/memory/preview"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "access_token": "numquam"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-memory-preview">
</span>
<span id="execution-results-POSTapi-memory-preview" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-memory-preview"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-memory-preview"></code></pre>
</span>
<span id="execution-error-POSTapi-memory-preview" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-memory-preview"></code></pre>
</span>
<form id="form-POSTapi-memory-preview" data-method="POST"
      data-path="api/memory/preview"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-memory-preview', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-memory-preview"
                    onclick="tryItOut('POSTapi-memory-preview');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-memory-preview"
                    onclick="cancelTryOut('POSTapi-memory-preview');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-memory-preview" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/memory/preview</code></b>
        </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>access_token</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="access_token"
               data-endpoint="POSTapi-memory-preview"
               value="numquam"
               data-component="body" hidden>
    <br>

        </p>
        </form>

            <h2 id="memory-fetch-management-POSTapi-memory-delete">POST api/memory/delete</h2>

<p>
</p>



<span id="example-requests-POSTapi-memory-delete">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/memory/delete" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"access_token\": \"repellat\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/memory/delete"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "access_token": "repellat"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-memory-delete">
</span>
<span id="execution-results-POSTapi-memory-delete" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-memory-delete"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-memory-delete"></code></pre>
</span>
<span id="execution-error-POSTapi-memory-delete" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-memory-delete"></code></pre>
</span>
<form id="form-POSTapi-memory-delete" data-method="POST"
      data-path="api/memory/delete"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-memory-delete', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-memory-delete"
                    onclick="tryItOut('POSTapi-memory-delete');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-memory-delete"
                    onclick="cancelTryOut('POSTapi-memory-delete');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-memory-delete" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/memory/delete</code></b>
        </p>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <p>
            <b><code>access_token</code></b>&nbsp;&nbsp;<small>string</small>  &nbsp;
                <input type="text"
               name="access_token"
               data-endpoint="POSTapi-memory-delete"
               value="repellat"
               data-component="body" hidden>
    <br>

        </p>
        </form>

            <h2 id="memory-fetch-management-POSTapi-user-memories">POST api/user/memories</h2>

<p>
</p>



<span id="example-requests-POSTapi-user-memories">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/user/memories" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/user/memories"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-user-memories">
</span>
<span id="execution-results-POSTapi-user-memories" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-user-memories"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-user-memories"></code></pre>
</span>
<span id="execution-error-POSTapi-user-memories" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-user-memories"></code></pre>
</span>
<form id="form-POSTapi-user-memories" data-method="POST"
      data-path="api/user/memories"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}'
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-user-memories', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-user-memories"
                    onclick="tryItOut('POSTapi-user-memories');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-user-memories"
                    onclick="cancelTryOut('POSTapi-user-memories');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-user-memories" hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/user/memories</code></b>
        </p>
                    </form>

    

        
    </div>
    <div class="dark-box">
                    <div class="lang-selector">
                                                        <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                                        <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                            </div>
            </div>
</div>
</body>
</html>
