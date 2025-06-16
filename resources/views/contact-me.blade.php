<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="{{ asset('css/contact/style.css') }}">
</head>

<body>
    @include('components.head-menu')
    <main class="main">
        <div class="leftMenuBox">
            @include('components.contacts-details-block')
            <details class="findMeBox">
                <summary class="findMeBox_summary">find-me-also-in</summary>
                <div class="findMeBox_box">
                    <a href="https://www.instagram.com/night_comfort93?igsh=MTUzNWE2bmtjeW9keA==" class="findMeBox_link"
                        target="_blank" rel="noopener noreferrer">
                        <svg class="findMeBox_link__svg" width="12" height="13" viewBox="0 0 12 13" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M4.66667 2.5V3.83333H1.33333V11.1667H8.66667V7.83333H10V11.8333C10 12.0101 9.92976 12.1797 9.80474 12.3047C9.67971 12.4298 9.51014 12.5 9.33333 12.5H0.666667C0.489856 12.5 0.320286 12.4298 0.195262 12.3047C0.0702379 12.1797 0 12.0101 0 11.8333V3.16667C0 2.98986 0.0702379 2.82029 0.195262 2.69526C0.320286 2.57024 0.489856 2.5 0.666667 2.5H4.66667ZM12 0.5V5.83333H10.6667V2.77533L5.47133 7.97133L4.52867 7.02867L9.72333 1.83333H6.66667V0.5H12Z" />
                        </svg>
                        <span class="findMeBox_link__text">Instagram</span>
                    </a>
                    <a href="https://t.me/salispiligrim" class="findMeBox_link" target="_blank"
                        rel="noopener noreferrer">
                        <svg class="findMeBox_link__svg" width="12" height="13" viewBox="0 0 12 13" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M4.66667 2.5V3.83333H1.33333V11.1667H8.66667V7.83333H10V11.8333C10 12.0101 9.92976 12.1797 9.80474 12.3047C9.67971 12.4298 9.51014 12.5 9.33333 12.5H0.666667C0.489856 12.5 0.320286 12.4298 0.195262 12.3047C0.0702379 12.1797 0 12.0101 0 11.8333V3.16667C0 2.98986 0.0702379 2.82029 0.195262 2.69526C0.320286 2.57024 0.489856 2.5 0.666667 2.5H4.66667ZM12 0.5V5.83333H10.6667V2.77533L5.47133 7.97133L4.52867 7.02867L9.72333 1.83333H6.66667V0.5H12Z" />
                        </svg>
                        <span class="findMeBox_link__text">Telegram</span>
                    </a>
                </div>
            </details>

        </div>
        <div class="content">
            <div class="content_emptyBlock"></div>
            <div class="content_contentBlock">
                <div class="formBox">
                    <form class="form" action="{{ route('contact.send') }}" method="post">
                        @csrf
                        <div class="inputBox">
                            <label for="name" class="inputBox_text">_name:</label>
                            <input class="inputBox_input" type="text" name="name" id="nameInput">
                        </div>
                        <div class="inputBox">
                            <label for="" class="inputBox_text">_email:</label>
                            <input class="inputBox_input" type="email" name="email" id="emailInput">
                        </div>
                        <div class="inputBox">
                            <label for="" class="inputBox_text">_message:</label>
                            <textarea class="inputBox_inputMessage" name="message" rows="6" wrap="soft"
                                id="messageInput"></textarea>
                        </div>
                        <input class="form_submit" type="submit" value="submit-message">
                    </form>
                </div>

                <div class="codeBlock">
                    <ol class="code">
                        <li class="code_line">
                            <span class="code_violet">const</span>
                            <span class="code_blue">button</span>
                            <span class="code_violet">=</span>
                            <span class="code_blue">document</span>.<span class="code_blue">querySelector</span>(<span
                                class="code_orange">'#sendBtn'</span>);
                        </li>
                        <li class="code_line"></li>
                        <li class="code_line">
                            <span class="code_violet">const</span>
                            <span class="code_blue">message</span>
                            <span class="code_violet">=</span> {
                        </li>
                        <li class="code_line">
                            <span>&nbsp;&nbsp;&nbsp;&nbsp;</span><span class="code_blue">name: </span><span
                                class="code_orange" id="name">""</span>,
                        </li>
                        <li class="code_line">
                            <span>&nbsp;&nbsp;&nbsp;&nbsp;</span><span class="code_blue">email: </span><span
                                class="code_orange" id="email">""</span>,
                        </li>
                        <li class="code_line" id="messageLi">
                            <span>&nbsp;&nbsp;&nbsp;&nbsp;</span><span class="code_blue">message: </span><span
                                class="code_orange" id="message">""</span>,
                        </li>
                        <li class="code_line">
                            <span>&nbsp;&nbsp;&nbsp;&nbsp;</span><span class="code_blue">date: </span><span
                                class="code_orange">"{{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}"</span>,
                        </li>
                        <li class="code_line">}</li>
                        <li class="code_line"></li>
                        <li class="code_line">
                            <span class="code_blue">button</span>.<span class="code_blue">addEventListener</span>(<span
                                class="code_orange">'click'</span>, () <span class="code_violet">=></span> {
                        </li>
                        <li class="code_line">
                            <span>&nbsp;&nbsp;&nbsp;&nbsp;</span><span class="code_blue">form</span>.<span
                                class="code_blue">send</span>(<span class="code_blue">message</span>);
                        </li>
                        <li class="code_line">})</li>
                    </ol>
                </div>
            </div>

        </div>
    </main>
    @include('components.footer')
    <script src="{{ asset('js/contact-me.js') }}"></script>
</body>

</html>