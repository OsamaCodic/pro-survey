{{-- Toggle Button --}}
<style>
    
    .zoom {
		transition: transform .2s;
	}
	.zoom:hover {
		transform: scale(1.07);
	}

    /* The switch - the box around the slider */
    .switch {
    position: relative;
    display: inline-block;
    width: 60px;
    height: 24;
    }

    /* Hide default HTML checkbox */
    .switch input {
    opacity: 0;
    width: 0;
    height: 0;
    }

    /* The slider */
    .slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 2px;
    right: 15px;
    bottom: 3px;
    background-color: #d7f3de;
    -webkit-transition: .4s;
    transition: .4s;
    }

    .slider:before {

        position: absolute;
        content: "";
        height: 13px;
        width: 13px;
        left: 2px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
    }

    input:checked + .slider {
    background-color: #28a745;
    }

    input:focus + .slider {
    box-shadow: 0 0 1px #2196F3;
    }

    input:checked + .slider:before {
    -webkit-transform: translateX(26px);
    -ms-transform: translateX(26px);
    transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
    border-radius: 34px;
    top: 6px;
    }

    .slider.round:before {
    border-radius: 50%;
    top: 1px;
    }
</style>
{{-- /Toggle Button --}}