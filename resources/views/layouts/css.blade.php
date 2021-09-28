<style>
    /* This CSS will apply on whole project */

    .zoom {
		transition: transform .2s;
	}
	.zoom:hover {
		transform: scale(1.5);
	}

    .required:after{ 
        content:'*'; 
        color:red; 
        padding-left:5px;
    }

    .error{
        color: red;
    }
    label.error.fail-alert {
        font-weight: 500;
        border-radius: 4px;
        line-height: 1;
        padding: 2px 0 6px 6px;
    }
    input.valid.success-alert {
        border: 1px solid #4CAF50;
        color: green;
    }
    input.error.fail-alert {
        border: 1px solid red;
        color: red;
    }
    textarea.valid.success-alert {
        border: 1px solid #4CAF50;
        color: green;
    }
    
    textarea.error.fail-alert {
        border: 1px solid red;
        color: red;
    }
    
    select.valid.success-alert {
        border: 1px solid #4CAF50;
        color: green;
    }
    select.error.fail-alert {
        border: 1px solid red;
        color: red;
    }
</style>