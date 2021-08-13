<?php
include 'dbinfo.php';
?>
<?php

session_start();

$username = $_SESSION['username'];
unset($_SESSION['isbn']);
unset($_SESSION['copyid']);
?>
<html>

<head>
    <title>User privelages</title>
    <link rel="stylesheet" href="library.css">
    <style>
        .child-centralise {
            width: 100%;
        }

        .primary-button {
            width: 100%;
            height: 100%;
            background-color: #2978A0;
            border: 3px solid black;
            border-radius: 2px;
            color: white;
        }

        td {
            height: 70px;
            width: 400px;
            padding-right: 5%;
            padding-left: 5%;
            padding-top: 2%;
            padding-bottom: 2%;
        }

        form {
            height: 100%;
        }

        img {
            width: 10%;
        }

        #forMobile {
            display: none;
        }

        #forDesktop {
            display: block;
        }

        @media only screen and (max-width: 40em) {
            #forDesktop {
                display: none;
            }
            #forMobile {
                display: flex;
                justify-content: center;
            }
            body {
                overflow-y: scroll;
                -ms-overflow-style: none;
                scrollbar-width: none;
            }
            body::-webkit-scrollbar {
                display: none;
            }
        }
    </style>
</head>

<body>
    <h1 id="title">User Privileges</h1>
    <div class="parent">
        <div class="child-centralise">
            <br>
            <div id="forDesktop">
                <table class="justForNow" style="padding-top: 2%">
                    <tr>
                        <td>
                            <form action="SearchBooks.php" method="post">
                                <button class="primary-button large" type="submit"><img src="assets/search.svg" style="width: 14%">
                                    <p>Search Books</p>
                                </button>
                            </form>
                        </td>
                        <td>
                            <form action="TrackBookLocation.php" method="post">
                                <button class="primary-button large" type="submit"><img src="assets/track.svg" style="width: 12%;">
                                    <p>Track Book Location</p>
                                </button>
                            </form>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <form action="BookCheckout.php" method="post">
                                <button class="primary-button large" type="submit"><img src="assets/checkout.svg" style="width: 14%">
                                    <p>Checkout Books</p>
                                </button>
                            </form>
                        </td>
                        <td>
                            <form action="FutureHoldRequestforaBook.php" method="post">
                                <button class="primary-button large" type="submit"><img src="assets/futureHold.svg">
                                    <p>Future Hold Request</p>
                                </button>
                            </form>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <form action="RequestExtensionOnaBook.php" method="post">
                                <button class="primary-button large" type="submit"><img src="assets/expand.svg" style="width: 15%">
                                    <p>Extension Request</p>
                                </button>
                            </form>
                        </td>
                        <td>
                            <form action="ReturnBook.php" method="post">
                                <button class="primary-button large" type="submit"><img src="assets/return.svg" style="width: 15%">
                                    <p>Return Books</p>
                                </button>
                            </form>
                        </td>
                    </tr>
                </table>
            </div>
            <div id="forMobile">
                <table class="justForNow" style="padding-top: 2%" id="forMobile">
                    <tr>
                        <td>
                            <form action="SearchBooks.php" method="post">
                                <button class="primary-button large" type="submit"><img src="assets/search.svg" style="width: 14%">
                                    <p>Search Books</p>
                                </button>
                            </form>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <form action="TrackBookLocation.php" method="post">
                                <button class="primary-button large" type="submit"><img src="assets/track.svg" style="width: 12%;">
                                    <p>Track Book Location</p>
                                </button>
                            </form>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <form action="BookCheckout.php" method="post">
                                <button class="primary-button large" type="submit"><img src="assets/checkout.svg" style="width: 14%">
                                    <p>Checkout Books</p>
                                </button>
                            </form>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <form action="FutureHoldRequestforaBook.php" method="post">
                                <button class="primary-button large" type="submit"><img src="assets/futureHold.svg">
                                    <p>Future Hold Request</p>
                                </button>
                            </form>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <form action="RequestExtensionOnaBook.php" method="post">
                                <button class="primary-button large" type="submit"><img src="assets/expand.svg" style="width: 15%">
                                    <p>Extension Request</p>
                                </button>
                            </form>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <form action="ReturnBook.php" method="post">
                                <button class="primary-button large" type="submit"><img src="assets/return.svg" style="width: 15%">
                                    <p>Return Books</p>
                                </button>
                            </form>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="justForNow" style="padding-top: 1%">
                <form action="Login.php" method="post">
                    <input class="secondary-button large" type="submit" value="Close" style="width: max-content;" />
                </form>
            </div>
        </div>
    </div>
</body>

</html>