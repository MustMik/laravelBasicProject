@extends('welcome')

@section('content')
    <div class="wrapper">
        <div class="text section-title text-center fs-2">Create a new form</div>

        {{--        <form class="field-form w-25" method="post" action="{{route('forms.store')}}">--}}
        {{--            @csrf--}}
        {{--            @method('post')--}}
        {{--            <div class="form-floating">--}}
        {{--                <input type="text" class="form-control" name="formName" id="formName">--}}
        {{--                <label for="formName">Form name</label>--}}
        {{--            </div>--}}
        {{--            <div class="form-floating">--}}
        {{--                <input type="url" oninput="hideAdditionalFieldsIfUrl()" class="form-control url" name="url" id="url">--}}
        {{--                <label for="url">Url</label>--}}
        {{--            </div>--}}
        {{--            <div class="situation-section" id="situation-section">--}}
        {{--                <div class="form-floating handler-type-additional-fields">--}}
        {{--                    <select onchange="handlerTypeAdditionalFields()" class="form-select handler-type"--}}
        {{--                            name="typeOfInputData" id="typeOfInputData"--}}
        {{--                            aria-label="Floating label select example">--}}
        {{--                        <option value="mail">Send mail</option>--}}
        {{--                        <option value="redirectUrl">Redirect</option>--}}
        {{--                    </select>--}}
        {{--                    <label for="typeOfInputData">Type of input data</label>--}}
        {{--                </div>--}}
        {{--                <div class="handler-type-fieldset">--}}
        {{--                    <div class="form-floating mail">--}}
        {{--                        <input type="text" class="form-control mail" name="mail"--}}
        {{--                               id="mail">--}}
        {{--                        <label for="mail">Mail</label>--}}
        {{--                    </div>--}}
        {{--                    <div class="form-floating d-none redirect-url">--}}
        {{--                        <input type="url" class="form-control redirect-url" name="redirectUrl"--}}
        {{--                               id="redirectUrl">--}}
        {{--                        <label for="redirectUrl">Url for redirect</label>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--                <div class="fieldset">--}}
        {{--                    <div class="field-divider mt-5">--}}
        {{--                        <div class="form-floating">--}}
        {{--                            <select class="form-select" name="fieldType" id="fieldType"--}}
        {{--                                    aria-label="Floating label select example">--}}
        {{--                                <option value="input">input</option>--}}
        {{--                                <option value="select">select</option>--}}
        {{--                                <option value="textarea">textarea</option>--}}
        {{--                                <option value="checkbox">checkbox</option>--}}
        {{--                                <option value="range">range</option>--}}
        {{--                            </select>--}}
        {{--                            <label for="fieldType">Field type</label>--}}
        {{--                        </div>--}}
        {{--                        <div class="form-floating">--}}
        {{--                            <select class="form-select" name="typeOfInputData" id="typeOfInputData"--}}
        {{--                                    aria-label="Floating label select example">--}}
        {{--                                <option value="1">Any text</option>--}}
        {{--                                <option value="2">Only digits</option>--}}
        {{--                                <option value="3">Select option</option>--}}
        {{--                                <option value="4">Data</option>--}}
        {{--                                <option value="5">Time</option>--}}
        {{--                            </select>--}}
        {{--                            <label for="typeOfInputData">Type of input data</label>--}}
        {{--                        </div>--}}
        {{--                        <div class="form-floating">--}}
        {{--                            <input type="text" class="form-control" name="defaultValue" id="defaultValue">--}}
        {{--                            <label for="defaultValue">Default value (not required)</label>--}}
        {{--                        </div>--}}
        {{--                        <div class="input-group mb-3">--}}
        {{--                            <div class="input-group-text">--}}
        {{--                                <input class="form-check-input mt-0" name="required" id="required" type="checkbox"--}}
        {{--                                       value="1"--}}
        {{--                                       aria-label="Checkbox for following text input">--}}
        {{--                                <label for="required">Required</label>--}}
        {{--                            </div>--}}
        {{--                        </div>--}}
        {{--                        <div class="form-floating">--}}
        {{--                            <input type="text" name="fieldName" class="form-control" id="fieldName">--}}
        {{--                            <label for="fieldName">Field name</label>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--            <button type="submit" class="btn btn-success">Save Form</button>--}}

        {{--            <button type="button" onclick="addNewField()" class="btn btn-success"--}}
        {{--                    name="additional-field">Add new field--}}
        {{--            </button>--}}
        {{--            <button type="button" onclick="addToArrayObject()" class="btn btn-success"--}}
        {{--                    name="additional-field">Test--}}
        {{--            </button>--}}
        {{--        </form>--}}


        <form id="myForm" method="post" action="{{route('forms.store')}}">

            <div class="form-floating">
                <input type="text" class="form-control" name="myInput" id="myInput">
                <label for="myInput">Text</label>
            </div>
            <button class="btn btn-success" type="submit">Отправить</button>
        </form>

    </div>


    <script>
        const form = document.querySelector('#myForm');
        form.addEventListener('submit', function (event) {
            event.preventDefault();

            // Получаем значение из поля ввода
            const inputValue = document.querySelector('#myInput').value;

            // Создаем объект FormData и добавляем значение поля
            const formData = new FormData();
            formData.append('myInput', inputValue);

            const xhr = new XMLHttpRequest();

            xhr.open('POST', {{url('/forms/store')}});
            xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}'); // Если используется защита CSRF в Laravel

            xhr.onload = function () {
                if (xhr.status === 200) {
                    // Обработка успешного ответа от сервера
                    console.log(xhr.responseText);
                } else {
                    // Обработка ошибки
                    console.error('Произошла ошибка:', xhr.status);
                }
            };

            xhr.send(formData);
        });


        const arrayOfObjects = [];

        function hideAdditionalFieldsIfUrl() {
            let additionalFields = document.querySelector("#situation-section");
            let url = document.querySelector(".url");

            if (url.value !== "") {
                additionalFields.style.display = "none";
            } else {
                additionalFields.style.display = null;
            }

        }

        function handlerTypeAdditionalFields() {
            let redirectDiv = document.querySelector('.redirect-url');
            let mailDiv = document.querySelector('.mail');
            let select = document.querySelector('.handler-type');

            if (select.value === "mail") {
                mailDiv.classList.remove('d-none');
                redirectDiv.classList.add('d-none');
            } else {
                redirectDiv.classList.remove('d-none');
                mailDiv.classList.add('d-none');
            }
        }

        function addToArrayObject() {
            let form = document.querySelector(".field-form");

            let formData = new FormData(form);

            let formValues = {};

            for (let pair of formData.entries()) {
                formValues[pair[0]] = pair[1];
            }

            arrayOfObjects.push(JSON.stringify(formValues));

            console.log(arrayOfObjects);
        }

        function formToJson() {

            let form = document.querySelector(".field-form");

            let formData = new FormData(form);

            let formValues = {};

            for (let pair of formData.entries()) {
                formValues[pair[0]] = pair[1];
            }

            let jsonData = JSON.stringify(formValues);

            console.log(jsonData);

            let obj = {
                field: {
                    name: 123
                },
                field1: {
                    name: 321
                }
            }

            console.log(obj);
        }

        function addNewField() {
            let counter =

                let
            fieldset = document.querySelector(".fieldset");
            let addTest = document.querySelector(".additional-fieldset");
            addTest.innerHTML += fieldset.innerHTML;

            console.log(fieldset);
        }

        // var addButton = document.getElementById('add-select-btn');
        // var container = document.getElementById('select-container');
        //
        // // Add event listener to the button
        // addButton.addEventListener('click', function () {
        //     // Create select element
        //     var selectElement = document.createElement('select');
        //
        //     // Create option elements
        //     var option1 = document.createElement('option');
        //     option1.value = 'option1';
        //     option1.text = 'Option 1';
        //     var option2 = document.createElement('option');
        //     option2.value = 'option2';
        //     option2.text = 'Option 2';
        //     var option3 = document.createElement('option');
        //     option3.value = 'option3';
        //     option3.text = 'Option 3';
        //
        //     // Append options to the select element
        //     selectElement.appendChild(option1);
        //     selectElement.appendChild(option2);
        //     selectElement.appendChild(option3);
        //
        //     // Append select element to the container
        //     container.appendChild(selectElement);
        // });
    </script>
@endsection
