@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="order">
            <h3>Tafel {{ $order->table->id }} - Status: {{ $order->order_status }}</h3>
            <div class="food-list">
                <h4>Foods:</h4>
                <ul>
                    @foreach ($order->orderedMenuItems as $item)
                        @if ($item->menuItem->menu_category_id >= 1 && $item->menuItem->menu_category_id <= 3)
                            <li>
                                {{ $item->menuItem->name }} x {{ $item->quantity }}
                                <input type="checkbox" class="checkbox">
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
            <div class="drink-list">
                <h4>Drinks:</h4>
                <ul>
                    @foreach ($order->orderedMenuItems as $item)
                        @if ($item->menuItem->menu_category_id >= 4 && $item->menuItem->menu_category_id <= 7)
                            <li>
                                {{ $item->menuItem->name }} x {{ $item->quantity }}
                                <input type="checkbox" class="checkbox">
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>

            <!-- Use the existing "Submit" button to handle form submission -->
            <form action="{{ route('set.order.ready', ['orderId' => $order->id]) }}" method="post" id="orderForm">
                @csrf
                @method('post')
                <button type="button" id="submitBtn" onclick="submitForm()">Send out</button>
            </form>
        </div>
    </div>


<style>
    .container {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
        background-color: #f0f0f0;
        padding: 20px;
        padding-top: 0; /* No padding at the top of the container */
        margin-top: 100px;
        position: relative; /* Added position: relative */
    }

    .order {
        background-color: #9DBF9E; /* The specified green color */
        color: #ffffff; /* White text */
        margin: 10px;
        padding: 20px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        transition: 0.3s;
        width: calc(80% - 20px); /* Adjust the width as necessary */
        box-sizing: border-box;
        border-radius: 5px; /* Rounded corners */
        position: relative; /* Added position: relative */
    }

    .order:hover {
        box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
    }

    .order h3 {
        font-size: 1.2em;
        margin-bottom: 0.5em;
    }

    .order ul {
        list-style-type: none;
        padding: 0;
        position: relative; /* Added position: relative */
    }

    .order ul li {
        font-size: 1em;
        margin-bottom: 0.25em;
        position: relative; /* Added position: relative */
    }

    /* Add this style to position the checkboxes */
    .order ul li input[type="checkbox"] {
        position: absolute;
        top: 0;
        right: 0;
    }

    #submitBtn {
        margin-top: 20px;
        padding: 10px;
        cursor: pointer;
    }

    .food-list,
    .drink-list {
        margin-top: 20px;
    }

    /* Add additional styles here for header and footer as per your existing layout */
</style>

<script>
    // Function to check if all checkboxes are marked
    function areAllCheckboxesChecked() {
        var checkboxes = document.querySelectorAll('.checkbox');
        for (var i = 0; i < checkboxes.length; i++) {
            if (!checkboxes[i].checked) {
                return false;
            }
        }
        return true;
    }

    // Function to enable/disable the button based on checkbox states
    function updateSubmitButton() {
        var submitBtn = document.getElementById('submitBtn');
        submitBtn.disabled = !areAllCheckboxesChecked();
    }

    // Function to handle button click (you can modify this according to your needs)
    function submitForm() {
        if (areAllCheckboxesChecked()) {
            // Perform the action when all checkboxes are checked
            document.getElementById('orderForm').submit(); // Submit the form
        } else {
            // Handle the case when not all checkboxes are checked
            alert('Please check all checkboxes before submitting.');
        }
    }

    // Add an event listener to update the button state when checkboxes change
    var checkboxes = document.querySelectorAll('.checkbox');
    checkboxes.forEach(function (checkbox) {
        checkbox.addEventListener('change', updateSubmitButton);
    });
</script>
@endsection
