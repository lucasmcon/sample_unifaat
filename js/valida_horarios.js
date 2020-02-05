//////////////////////// SEGUNDA //////////////////////////////////

$('#seg_hr_ini_1').blur(function(){ 
    if($('#seg_hr_ini_1').val() != '' && $('#seg_hr_fin_1').val() != ''){     
        var seg_hr_ini_1 = Date.parse('01/01/2015 '+$('#seg_hr_ini_1').val());
        var seg_hr_fin_1 = Date.parse('01/01/2015 '+$('#seg_hr_fin_1').val());

        if($('#seg_hr_ini_2').val() != ''){
            var seg_hr_ini_2 = Date.parse('01/01/2015 '+$('#seg_hr_ini_2').val());
            if(seg_hr_ini_2 < seg_hr_fin_1){
                $('#segErro02').modal('show');
                $('#seg_hr_ini_2').val('');

            }else if($('#seg_hr_fin_2').val() != ''){
                var seg_hr_fin_2 = Date.parse('01/01/2015 '+$('#seg_hr_fin_2').val());
                
                if(seg_hr_ini_2 > seg_hr_fin_2){
                    $('#segErro03').modal('show');
                    $('#seg_hr_ini_2').val('');
                }else if(seg_hr_ini_1 > seg_hr_fin_1){
                    $('#segErro01').modal('show');
                    $('#seg_hr_ini_1').val('');
                }
            }else{
                if(seg_hr_ini_1 > seg_hr_fin_1){
                    $('#segErro01').modal('show');
                    $('#seg_hr_ini_1').val('');
                }
            }
        }else{
            if(seg_hr_ini_1 > seg_hr_fin_1){
                $('#segErro01').modal('show');
                $('#seg_hr_ini_1').val('');
            }
        }
    }
}) 

$('#seg_hr_fin_1').blur(function(){
    if($('#seg_hr_ini_1').val() != '' && $('#seg_hr_fin_1').val() != ''){     
        var seg_hr_ini_1 = Date.parse('01/01/2015 '+$('#seg_hr_ini_1').val());
        var seg_hr_fin_1 = Date.parse('01/01/2015 '+$('#seg_hr_fin_1').val());

        if($('#seg_hr_ini_2').val() != ''){
            var seg_hr_ini_2 = Date.parse('01/01/2015 '+$('#seg_hr_ini_2').val());
            if(seg_hr_ini_2 < seg_hr_fin_1){
                $('#segErro02').modal('show');
                $('#seg_hr_ini_2').val('');

            }else if($('#seg_hr_fin_2').val() != ''){
                var seg_hr_fin_2 = Date.parse('01/01/2015 '+$('#seg_hr_fin_2').val());
                
                if(seg_hr_ini_2 > seg_hr_fin_2){
                    $('#segErro03').modal('show');
                    $('#seg_hr_ini_2').val('');
                }else if(seg_hr_ini_1 > seg_hr_fin_1){
                    $('#segErro01').modal('show');
                    $('#seg_hr_ini_1').val('');
                }
            }else{
                if(seg_hr_ini_1 > seg_hr_fin_1){
                    $('#segErro01').modal('show');
                    $('#seg_hr_ini_1').val('');
                }
            }
        }else{
            if(seg_hr_ini_1 > seg_hr_fin_1){
                $('#segErro01').modal('show');
                $('#seg_hr_ini_1').val('');
            }
        }
    }
})

$('#seg_hr_ini_2').blur(function(){
    if($('#seg_hr_ini_1').val() != '' && $('#seg_hr_fin_1').val() != ''){     
        var seg_hr_ini_1 = Date.parse('01/01/2015 '+$('#seg_hr_ini_1').val());
        var seg_hr_fin_1 = Date.parse('01/01/2015 '+$('#seg_hr_fin_1').val());

        if($('#seg_hr_ini_2').val() != ''){
            var seg_hr_ini_2 = Date.parse('01/01/2015 '+$('#seg_hr_ini_2').val());
            if(seg_hr_ini_2 < seg_hr_fin_1){
                $('#segErro02').modal('show');
                $('#seg_hr_ini_2').val('');

            }else if($('#seg_hr_fin_2').val() != ''){
                var seg_hr_fin_2 = Date.parse('01/01/2015 '+$('#seg_hr_fin_2').val());
                
                if(seg_hr_ini_2 > seg_hr_fin_2){
                    $('#segErro03').modal('show');
                    $('#seg_hr_ini_2').val('');
                }else if(seg_hr_ini_1 > seg_hr_fin_1){
                    $('#segErro01').modal('show');
                    $('#seg_hr_ini_1').val('');
                }
            }else{
                if(seg_hr_ini_1 > seg_hr_fin_1){
                    $('#segErro01').modal('show');
                    $('#seg_hr_ini_1').val('');
                }
            }
        }else{
            if(seg_hr_ini_1 > seg_hr_fin_1){
                $('#segErro01').modal('show');
                $('#seg_hr_ini_1').val('');
            }
        }
    }
})

$('#seg_hr_fin_2').blur(function(){
    if($('#seg_hr_ini_1').val() != '' && $('#seg_hr_fin_1').val() != ''){     
        var seg_hr_ini_1 = Date.parse('01/01/2015 '+$('#seg_hr_ini_1').val());
        var seg_hr_fin_1 = Date.parse('01/01/2015 '+$('#seg_hr_fin_1').val());

        if($('#seg_hr_ini_2').val() != ''){
            var seg_hr_ini_2 = Date.parse('01/01/2015 '+$('#seg_hr_ini_2').val());
            if(seg_hr_ini_2 < seg_hr_fin_1){
                $('#segErro02').modal('show');
                $('#seg_hr_ini_2').val('');

            }else if($('#seg_hr_fin_2').val() != ''){
                var seg_hr_fin_2 = Date.parse('01/01/2015 '+$('#seg_hr_fin_2').val());
                
                if(seg_hr_ini_2 > seg_hr_fin_2){
                    $('#segErro03').modal('show');
                    $('#seg_hr_ini_2').val('');
                }else if(seg_hr_ini_1 > seg_hr_fin_1){
                    $('#segErro01').modal('show');
                    $('#seg_hr_ini_1').val('');
                }
            }else{
                if(seg_hr_ini_1 > seg_hr_fin_1){
                    $('#segErro01').modal('show');
                    $('#seg_hr_ini_1').val('');
                }
            }
        }else{
            if(seg_hr_ini_1 > seg_hr_fin_1){
                $('#segErro01').modal('show');
                $('#seg_hr_ini_1').val('');
            }
        }
    }
}) 

/////////////////////////////// TERÇA ////////////////////

$('#ter_hr_ini_1').blur(function(){ 
    if($('#ter_hr_ini_1').val() != '' && $('#ter_hr_fin_1').val() != ''){     
        var ter_hr_ini_1 = Date.parse('01/01/2015 '+$('#ter_hr_ini_1').val());
        var ter_hr_fin_1 = Date.parse('01/01/2015 '+$('#ter_hr_fin_1').val());

        if($('#ter_hr_ini_2').val() != ''){
            var ter_hr_ini_2 = Date.parse('01/01/2015 '+$('#ter_hr_ini_2').val());
            if(ter_hr_ini_2 < ter_hr_fin_1){
                $('#terErro02').modal('show');
                $('#ter_hr_ini_2').val('');

            }else if($('#ter_hr_fin_2').val() != ''){
                var ter_hr_fin_2 = Date.parse('01/01/2015 '+$('#ter_hr_fin_2').val());
                
                if(ter_hr_ini_2 > ter_hr_fin_2){
                    $('#terErro03').modal('show');
                    $('#ter_hr_ini_2').val('');
                }else if(ter_hr_ini_1 > ter_hr_fin_1){
                    $('#terErro01').modal('show');
                    $('#ter_hr_ini_1').val('');
                }
            }else{
                if(ter_hr_ini_1 > ter_hr_fin_1){
                    $('#terErro01').modal('show');
                    $('#ter_hr_ini_1').val('');
                }
            }
        }else{
            if(ter_hr_ini_1 > ter_hr_fin_1){
                $('#terErro01').modal('show');
                $('#ter_hr_ini_1').val('');
            }
        }
    }
}) 

$('#ter_hr_fin_1').blur(function(){
    if($('#ter_hr_ini_1').val() != '' && $('#ter_hr_fin_1').val() != ''){     
        var ter_hr_ini_1 = Date.parse('01/01/2015 '+$('#ter_hr_ini_1').val());
        var ter_hr_fin_1 = Date.parse('01/01/2015 '+$('#ter_hr_fin_1').val());

        if($('#ter_hr_ini_2').val() != ''){
            var ter_hr_ini_2 = Date.parse('01/01/2015 '+$('#ter_hr_ini_2').val());
            if(ter_hr_ini_2 < ter_hr_fin_1){
                $('#terErro02').modal('show');
                $('#ter_hr_ini_2').val('');

            }else if($('#ter_hr_fin_2').val() != ''){
                var ter_hr_fin_2 = Date.parse('01/01/2015 '+$('#ter_hr_fin_2').val());
                
                if(ter_hr_ini_2 > ter_hr_fin_2){
                    $('#terErro03').modal('show');
                    $('#ter_hr_ini_2').val('');
                }else if(ter_hr_ini_1 > ter_hr_fin_1){
                    $('#terErro01').modal('show');
                    $('#ter_hr_ini_1').val('');
                }
            }else{
                if(ter_hr_ini_1 > ter_hr_fin_1){
                    $('#terErro01').modal('show');
                    $('#ter_hr_ini_1').val('');
                }
            }
        }else{
            if(ter_hr_ini_1 > ter_hr_fin_1){
                $('#terErro01').modal('show');
                $('#ter_hr_ini_1').val('');
            }
        }
    }
})

$('#ter_hr_ini_2').blur(function(){
    if($('#ter_hr_ini_1').val() != '' && $('#ter_hr_fin_1').val() != ''){     
        var ter_hr_ini_1 = Date.parse('01/01/2015 '+$('#ter_hr_ini_1').val());
        var ter_hr_fin_1 = Date.parse('01/01/2015 '+$('#ter_hr_fin_1').val());

        if($('#ter_hr_ini_2').val() != ''){
            var ter_hr_ini_2 = Date.parse('01/01/2015 '+$('#ter_hr_ini_2').val());
            if(ter_hr_ini_2 < ter_hr_fin_1){
                $('#terErro02').modal('show');
                $('#ter_hr_ini_2').val('');

            }else if($('#ter_hr_fin_2').val() != ''){
                var ter_hr_fin_2 = Date.parse('01/01/2015 '+$('#ter_hr_fin_2').val());
                
                if(ter_hr_ini_2 > ter_hr_fin_2){
                    $('#terErro03').modal('show');
                    $('#ter_hr_ini_2').val('');
                }else if(ter_hr_ini_1 > ter_hr_fin_1){
                    $('#terErro01').modal('show');
                    $('#ter_hr_ini_1').val('');
                }
            }else{
                if(ter_hr_ini_1 > ter_hr_fin_1){
                    $('#terErro01').modal('show');
                    $('#ter_hr_ini_1').val('');
                }
            }
        }else{
            if(ter_hr_ini_1 > ter_hr_fin_1){
                $('#terErro01').modal('show');
                $('#ter_hr_ini_1').val('');
            }
        }
    }
})

$('#ter_hr_fin_2').blur(function(){
    if($('#ter_hr_ini_1').val() != '' && $('#ter_hr_fin_1').val() != ''){     
        var ter_hr_ini_1 = Date.parse('01/01/2015 '+$('#ter_hr_ini_1').val());
        var ter_hr_fin_1 = Date.parse('01/01/2015 '+$('#ter_hr_fin_1').val());

        if($('#ter_hr_ini_2').val() != ''){
            var ter_hr_ini_2 = Date.parse('01/01/2015 '+$('#ter_hr_ini_2').val());
            if(ter_hr_ini_2 < ter_hr_fin_1){
                $('#terErro02').modal('show');
                $('#ter_hr_ini_2').val('');

            }else if($('#ter_hr_fin_2').val() != ''){
                var ter_hr_fin_2 = Date.parse('01/01/2015 '+$('#ter_hr_fin_2').val());
                
                if(ter_hr_ini_2 > ter_hr_fin_2){
                    $('#terErro03').modal('show');
                    $('#ter_hr_ini_2').val('');
                }else if(ter_hr_ini_1 > ter_hr_fin_1){
                    $('#terErro01').modal('show');
                    $('#ter_hr_ini_1').val('');
                }
            }else{
                if(ter_hr_ini_1 > ter_hr_fin_1){
                    $('#terErro01').modal('show');
                    $('#ter_hr_ini_1').val('');
                }
            }
        }else{
            if(ter_hr_ini_1 > ter_hr_fin_1){
                $('#terErro01').modal('show');
                $('#ter_hr_ini_1').val('');
            }
        }
    }
})

////////////////// QUARTA /////////////////////////////

$('#qua_hr_ini_1').blur(function(){ 
    if($('#qua_hr_ini_1').val() != '' && $('#qua_hr_fin_1').val() != ''){     
        var qua_hr_ini_1 = Date.parse('01/01/2015 '+$('#qua_hr_ini_1').val());
        var qua_hr_fin_1 = Date.parse('01/01/2015 '+$('#qua_hr_fin_1').val());

        if($('#qua_hr_ini_2').val() != ''){
            var qua_hr_ini_2 = Date.parse('01/01/2015 '+$('#qua_hr_ini_2').val());
            if(qua_hr_ini_2 < qua_hr_fin_1){
                $('#quaErro02').modal('show');
                $('#qua_hr_ini_2').val('');

            }else if($('#qua_hr_fin_2').val() != ''){
                var qua_hr_fin_2 = Date.parse('01/01/2015 '+$('#qua_hr_fin_2').val());
                
                if(qua_hr_ini_2 > qua_hr_fin_2){
                    $('#quaErro03').modal('show');
                    $('#qua_hr_ini_2').val('');
                }else if(qua_hr_ini_1 > qua_hr_fin_1){
                    $('#quaErro01').modal('show');
                    $('#qua_hr_ini_1').val('');
                }
            }else{
                if(qua_hr_ini_1 > qua_hr_fin_1){
                    $('#quaErro01').modal('show');
                    $('#qua_hr_ini_1').val('');
                }
            }
        }else{
            if(qua_hr_ini_1 > qua_hr_fin_1){
                $('#quaErro01').modal('show');
                $('#qua_hr_ini_1').val('');
            }
        }
    }
}) 

$('#qua_hr_fin_1').blur(function(){
    if($('#qua_hr_ini_1').val() != '' && $('#qua_hr_fin_1').val() != ''){     
        var qua_hr_ini_1 = Date.parse('01/01/2015 '+$('#qua_hr_ini_1').val());
        var qua_hr_fin_1 = Date.parse('01/01/2015 '+$('#qua_hr_fin_1').val());

        if($('#qua_hr_ini_2').val() != ''){
            var qua_hr_ini_2 = Date.parse('01/01/2015 '+$('#qua_hr_ini_2').val());
            if(qua_hr_ini_2 < qua_hr_fin_1){
                $('#quaErro02').modal('show');
                $('#qua_hr_ini_2').val('');

            }else if($('#qua_hr_fin_2').val() != ''){
                var qua_hr_fin_2 = Date.parse('01/01/2015 '+$('#qua_hr_fin_2').val());
                
                if(qua_hr_ini_2 > qua_hr_fin_2){
                    $('#quaErro03').modal('show');
                    $('#qua_hr_ini_2').val('');
                }else if(qua_hr_ini_1 > qua_hr_fin_1){
                    $('#quaErro01').modal('show');
                    $('#qua_hr_ini_1').val('');
                }
            }else{
                if(qua_hr_ini_1 > qua_hr_fin_1){
                    $('#quaErro01').modal('show');
                    $('#qua_hr_ini_1').val('');
                }
            }
        }else{
            if(qua_hr_ini_1 > qua_hr_fin_1){
                $('#quaErro01').modal('show');
                $('#qua_hr_ini_1').val('');
            }
        }
    }
})

$('#qua_hr_ini_2').blur(function(){
    if($('#qua_hr_ini_1').val() != '' && $('#qua_hr_fin_1').val() != ''){     
        var qua_hr_ini_1 = Date.parse('01/01/2015 '+$('#qua_hr_ini_1').val());
        var qua_hr_fin_1 = Date.parse('01/01/2015 '+$('#qua_hr_fin_1').val());

        if($('#qua_hr_ini_2').val() != ''){
            var qua_hr_ini_2 = Date.parse('01/01/2015 '+$('#qua_hr_ini_2').val());
            if(qua_hr_ini_2 < qua_hr_fin_1){
                $('#quaErro02').modal('show');
                $('#qua_hr_ini_2').val('');

            }else if($('#qua_hr_fin_2').val() != ''){
                var qua_hr_fin_2 = Date.parse('01/01/2015 '+$('#qua_hr_fin_2').val());
                
                if(qua_hr_ini_2 > qua_hr_fin_2){
                    $('#quaErro03').modal('show');
                    $('#qua_hr_ini_2').val('');
                }else if(qua_hr_ini_1 > qua_hr_fin_1){
                    $('#quaErro01').modal('show');
                    $('#qua_hr_ini_1').val('');
                }
            }else{
                if(qua_hr_ini_1 > qua_hr_fin_1){
                    $('#quaErro01').modal('show');
                    $('#qua_hr_ini_1').val('');
                }
            }
        }else{
            if(qua_hr_ini_1 > qua_hr_fin_1){
                $('#quaErro01').modal('show');
                $('#qua_hr_ini_1').val('');
            }
        }
    }
})

$('#qua_hr_fin_2').blur(function(){
    if($('#qua_hr_ini_1').val() != '' && $('#qua_hr_fin_1').val() != ''){     
        var qua_hr_ini_1 = Date.parse('01/01/2015 '+$('#qua_hr_ini_1').val());
        var qua_hr_fin_1 = Date.parse('01/01/2015 '+$('#qua_hr_fin_1').val());

        if($('#qua_hr_ini_2').val() != ''){
            var qua_hr_ini_2 = Date.parse('01/01/2015 '+$('#qua_hr_ini_2').val());
            if(qua_hr_ini_2 < qua_hr_fin_1){
                $('#quaErro02').modal('show');
                $('#qua_hr_ini_2').val('');

            }else if($('#qua_hr_fin_2').val() != ''){
                var qua_hr_fin_2 = Date.parse('01/01/2015 '+$('#qua_hr_fin_2').val());
                
                if(qua_hr_ini_2 > qua_hr_fin_2){
                    $('#quaErro03').modal('show');
                    $('#qua_hr_ini_2').val('');
                }else if(qua_hr_ini_1 > qua_hr_fin_1){
                    $('#quaErro01').modal('show');
                    $('#qua_hr_ini_1').val('');
                }
            }else{
                if(qua_hr_ini_1 > qua_hr_fin_1){
                    $('#quaErro01').modal('show');
                    $('#qua_hr_ini_1').val('');
                }
            }
        }else{
            if(qua_hr_ini_1 > qua_hr_fin_1){
                $('#quaErro01').modal('show');
                $('#qua_hr_ini_1').val('');
            }
        }
    }
})

/////////////////// QUINTA /////////////////////

$('#qui_hr_ini_1').blur(function(){ 
    if($('#qui_hr_ini_1').val() != '' && $('#qui_hr_fin_1').val() != ''){     
        var qui_hr_ini_1 = Date.parse('01/01/2015 '+$('#qui_hr_ini_1').val());
        var qui_hr_fin_1 = Date.parse('01/01/2015 '+$('#qui_hr_fin_1').val());

        if($('#qui_hr_ini_2').val() != ''){
            var qui_hr_ini_2 = Date.parse('01/01/2015 '+$('#qui_hr_ini_2').val());
            if(qui_hr_ini_2 < qui_hr_fin_1){
                $('#quiErro02').modal('show');
                $('#qui_hr_ini_2').val('');

            }else if($('#qui_hr_fin_2').val() != ''){
                var qui_hr_fin_2 = Date.parse('01/01/2015 '+$('#qui_hr_fin_2').val());
                
                if(qui_hr_ini_2 > qui_hr_fin_2){
                    $('#quiErro03').modal('show');
                    $('#qui_hr_ini_2').val('');
                }else if(qui_hr_ini_1 > qui_hr_fin_1){
                    $('#quiErro01').modal('show');
                    $('#qui_hr_ini_1').val('');
                }
            }else{
                if(qui_hr_ini_1 > qui_hr_fin_1){
                    $('#quiErro01').modal('show');
                    $('#qui_hr_ini_1').val('');
                }
            }
        }else{
            if(qui_hr_ini_1 > qui_hr_fin_1){
                $('#quiErro01').modal('show');
                $('#qui_hr_ini_1').val('');
            }
        }
    }
}) 

$('#qui_hr_fin_1').blur(function(){
    if($('#qui_hr_ini_1').val() != '' && $('#qui_hr_fin_1').val() != ''){     
        var qui_hr_ini_1 = Date.parse('01/01/2015 '+$('#qui_hr_ini_1').val());
        var qui_hr_fin_1 = Date.parse('01/01/2015 '+$('#qui_hr_fin_1').val());

        if($('#qui_hr_ini_2').val() != ''){
            var qui_hr_ini_2 = Date.parse('01/01/2015 '+$('#qui_hr_ini_2').val());
            if(qui_hr_ini_2 < qui_hr_fin_1){
                $('#quiErro02').modal('show');
                $('#qui_hr_ini_2').val('');

            }else if($('#qui_hr_fin_2').val() != ''){
                var qui_hr_fin_2 = Date.parse('01/01/2015 '+$('#qui_hr_fin_2').val());
                
                if(qui_hr_ini_2 > qui_hr_fin_2){
                    $('#quiErro03').modal('show');
                    $('#qui_hr_ini_2').val('');
                }else if(qui_hr_ini_1 > qui_hr_fin_1){
                    $('#quiErro01').modal('show');
                    $('#qui_hr_ini_1').val('');
                }
            }else{
                if(qui_hr_ini_1 > qui_hr_fin_1){
                    $('#quiErro01').modal('show');
                    $('#qui_hr_ini_1').val('');
                }
            }
        }else{
            if(qui_hr_ini_1 > qui_hr_fin_1){
                $('#quiErro01').modal('show');
                $('#qui_hr_ini_1').val('');
            }
        }
    }
})

$('#qui_hr_ini_2').blur(function(){
    if($('#qui_hr_ini_1').val() != '' && $('#qui_hr_fin_1').val() != ''){     
        var qui_hr_ini_1 = Date.parse('01/01/2015 '+$('#qui_hr_ini_1').val());
        var qui_hr_fin_1 = Date.parse('01/01/2015 '+$('#qui_hr_fin_1').val());

        if($('#qui_hr_ini_2').val() != ''){
            var qui_hr_ini_2 = Date.parse('01/01/2015 '+$('#qui_hr_ini_2').val());
            if(qui_hr_ini_2 < qui_hr_fin_1){
                $('#quiErro02').modal('show');
                $('#qui_hr_ini_2').val('');

            }else if($('#qui_hr_fin_2').val() != ''){
                var qui_hr_fin_2 = Date.parse('01/01/2015 '+$('#qui_hr_fin_2').val());
                
                if(qui_hr_ini_2 > qui_hr_fin_2){
                    $('#quiErro03').modal('show');
                    $('#qui_hr_ini_2').val('');
                }else if(qui_hr_ini_1 > qui_hr_fin_1){
                    $('#quiErro01').modal('show');
                    $('#qui_hr_ini_1').val('');
                }
            }else{
                if(qui_hr_ini_1 > qui_hr_fin_1){
                    $('#quiErro01').modal('show');
                    $('#qui_hr_ini_1').val('');
                }
            }
        }else{
            if(qui_hr_ini_1 > qui_hr_fin_1){
                $('#quiErro01').modal('show');
                $('#qui_hr_ini_1').val('');
            }
        }
    }
})

$('#qui_hr_fin_2').blur(function(){
    if($('#qui_hr_ini_1').val() != '' && $('#qui_hr_fin_1').val() != ''){     
        var qui_hr_ini_1 = Date.parse('01/01/2015 '+$('#qui_hr_ini_1').val());
        var qui_hr_fin_1 = Date.parse('01/01/2015 '+$('#qui_hr_fin_1').val());

        if($('#qui_hr_ini_2').val() != ''){
            var qui_hr_ini_2 = Date.parse('01/01/2015 '+$('#qui_hr_ini_2').val());
            if(qui_hr_ini_2 < qui_hr_fin_1){
                $('#quiErro02').modal('show');
                $('#qui_hr_ini_2').val('');

            }else if($('#qui_hr_fin_2').val() != ''){
                var qui_hr_fin_2 = Date.parse('01/01/2015 '+$('#qui_hr_fin_2').val());
                
                if(qui_hr_ini_2 > qui_hr_fin_2){
                    $('#quiErro03').modal('show');
                    $('#qui_hr_ini_2').val('');
                }else if(qui_hr_ini_1 > qui_hr_fin_1){
                    $('#quiErro01').modal('show');
                    $('#qui_hr_ini_1').val('');
                }
            }else{
                if(qui_hr_ini_1 > qui_hr_fin_1){
                    $('#quiErro01').modal('show');
                    $('#qui_hr_ini_1').val('');
                }
            }
        }else{
            if(qui_hr_ini_1 > qui_hr_fin_1){
                $('#quiErro01').modal('show');
                $('#qui_hr_ini_1').val('');
            }
        }
    }
})

///////////////// SEXTA //////////////////

$('#sex_hr_ini_1').blur(function(){ 
    if($('#sex_hr_ini_1').val() != '' && $('#sex_hr_fin_1').val() != ''){     
        var sex_hr_ini_1 = Date.parse('01/01/2015 '+$('#sex_hr_ini_1').val());
        var sex_hr_fin_1 = Date.parse('01/01/2015 '+$('#sex_hr_fin_1').val());

        if($('#sex_hr_ini_2').val() != ''){
            var sex_hr_ini_2 = Date.parse('01/01/2015 '+$('#sex_hr_ini_2').val());
            if(sex_hr_ini_2 < sex_hr_fin_1){
                $('#sexErro02').modal('show');
                $('#sex_hr_ini_2').val('');

            }else if($('#sex_hr_fin_2').val() != ''){
                var sex_hr_fin_2 = Date.parse('01/01/2015 '+$('#sex_hr_fin_2').val());
                
                if(sex_hr_ini_2 > sex_hr_fin_2){
                    $('#sexErro03').modal('show');
                    $('#sex_hr_ini_2').val('');
                }else if(sex_hr_ini_1 > sex_hr_fin_1){
                    $('#sexErro01').modal('show');
                    $('#sex_hr_ini_1').val('');
                }
            }else{
                if(sex_hr_ini_1 > sex_hr_fin_1){
                    $('#sexErro01').modal('show');
                    $('#sex_hr_ini_1').val('');
                }
            }
        }else{
            if(sex_hr_ini_1 > sex_hr_fin_1){
                $('#sexErro01').modal('show');
                $('#sex_hr_ini_1').val('');
            }
        }
    }
}) 

$('#sex_hr_fin_1').blur(function(){
    if($('#sex_hr_ini_1').val() != '' && $('#sex_hr_fin_1').val() != ''){     
        var sex_hr_ini_1 = Date.parse('01/01/2015 '+$('#sex_hr_ini_1').val());
        var sex_hr_fin_1 = Date.parse('01/01/2015 '+$('#sex_hr_fin_1').val());

        if($('#sex_hr_ini_2').val() != ''){
            var sex_hr_ini_2 = Date.parse('01/01/2015 '+$('#sex_hr_ini_2').val());
            if(sex_hr_ini_2 < sex_hr_fin_1){
                $('#sexErro02').modal('show');
                $('#sex_hr_ini_2').val('');

            }else if($('#sex_hr_fin_2').val() != ''){
                var sex_hr_fin_2 = Date.parse('01/01/2015 '+$('#sex_hr_fin_2').val());
                
                if(sex_hr_ini_2 > sex_hr_fin_2){
                    $('#sexErro03').modal('show');
                    $('#sex_hr_ini_2').val('');
                }else if(sex_hr_ini_1 > sex_hr_fin_1){
                    $('#sexErro01').modal('show');
                    $('#sex_hr_ini_1').val('');
                }
            }else{
                if(sex_hr_ini_1 > sex_hr_fin_1){
                    $('#sexErro01').modal('show');
                    $('#sex_hr_ini_1').val('');
                }
            }
        }else{
            if(sex_hr_ini_1 > sex_hr_fin_1){
                $('#sexErro01').modal('show');
                $('#sex_hr_ini_1').val('');
            }
        }
    }
})

$('#sex_hr_ini_2').blur(function(){
    if($('#sex_hr_ini_1').val() != '' && $('#sex_hr_fin_1').val() != ''){     
        var sex_hr_ini_1 = Date.parse('01/01/2015 '+$('#sex_hr_ini_1').val());
        var sex_hr_fin_1 = Date.parse('01/01/2015 '+$('#sex_hr_fin_1').val());

        if($('#sex_hr_ini_2').val() != ''){
            var sex_hr_ini_2 = Date.parse('01/01/2015 '+$('#sex_hr_ini_2').val());
            if(sex_hr_ini_2 < sex_hr_fin_1){
                $('#sexErro02').modal('show');
                $('#sex_hr_ini_2').val('');

            }else if($('#sex_hr_fin_2').val() != ''){
                var sex_hr_fin_2 = Date.parse('01/01/2015 '+$('#sex_hr_fin_2').val());
                
                if(sex_hr_ini_2 > sex_hr_fin_2){
                    $('#sexErro03').modal('show');
                    $('#sex_hr_ini_2').val('');
                }else if(sex_hr_ini_1 > sex_hr_fin_1){
                    $('#sexErro01').modal('show');
                    $('#sex_hr_ini_1').val('');
                }
            }else{
                if(sex_hr_ini_1 > sex_hr_fin_1){
                    $('#sexErro01').modal('show');
                    $('#sex_hr_ini_1').val('');
                }
            }
        }else{
            if(sex_hr_ini_1 > sex_hr_fin_1){
                $('#sexErro01').modal('show');
                $('#sex_hr_ini_1').val('');
            }
        }
    }
})

$('#sex_hr_fin_2').blur(function(){
    if($('#sex_hr_ini_1').val() != '' && $('#sex_hr_fin_1').val() != ''){     
        var sex_hr_ini_1 = Date.parse('01/01/2015 '+$('#sex_hr_ini_1').val());
        var sex_hr_fin_1 = Date.parse('01/01/2015 '+$('#sex_hr_fin_1').val());

        if($('#sex_hr_ini_2').val() != ''){
            var sex_hr_ini_2 = Date.parse('01/01/2015 '+$('#sex_hr_ini_2').val());
            if(sex_hr_ini_2 < sex_hr_fin_1){
                $('#sexErro02').modal('show');
                $('#sex_hr_ini_2').val('');

            }else if($('#sex_hr_fin_2').val() != ''){
                var sex_hr_fin_2 = Date.parse('01/01/2015 '+$('#sex_hr_fin_2').val());
                
                if(sex_hr_ini_2 > sex_hr_fin_2){
                    $('#sexErro03').modal('show');
                    $('#sex_hr_ini_2').val('');
                }else if(sex_hr_ini_1 > sex_hr_fin_1){
                    $('#sexErro01').modal('show');
                    $('#sex_hr_ini_1').val('');
                }
            }else{
                if(sex_hr_ini_1 > sex_hr_fin_1){
                    $('#sexErro01').modal('show');
                    $('#sex_hr_ini_1').val('');
                }
            }
        }else{
            if(sex_hr_ini_1 > sex_hr_fin_1){
                $('#sexErro01').modal('show');
                $('#sex_hr_ini_1').val('');
            }
        }
    }
})

/////////// SABADO ///////////

$('#sab_hr_ini_1').blur(function(){ 
    if($('#sab_hr_ini_1').val() != '' && $('#sab_hr_fin_1').val() != ''){     
        var sab_hr_ini_1 = Date.parse('01/01/2015 '+$('#sab_hr_ini_1').val());
        var sab_hr_fin_1 = Date.parse('01/01/2015 '+$('#sab_hr_fin_1').val());

        if($('#sab_hr_ini_2').val() != ''){
            var sab_hr_ini_2 = Date.parse('01/01/2015 '+$('#sab_hr_ini_2').val());
            if(sab_hr_ini_2 < sab_hr_fin_1){
                $('#sabErro02').modal('show');
                $('#sab_hr_ini_2').val('');

            }else if($('#sab_hr_fin_2').val() != ''){
                var sab_hr_fin_2 = Date.parse('01/01/2015 '+$('#sab_hr_fin_2').val());
                
                if(sab_hr_ini_2 > sab_hr_fin_2){
                    $('#sabErro03').modal('show');
                    $('#sab_hr_ini_2').val('');
                }else if(sab_hr_ini_1 > sab_hr_fin_1){
                    $('#sabErro01').modal('show');
                    $('#sab_hr_ini_1').val('');
                }
            }else{
                if(sab_hr_ini_1 > sab_hr_fin_1){
                    $('#sabErro01').modal('show');
                    $('#sab_hr_ini_1').val('');
                }
            }
        }else{
            if(sab_hr_ini_1 > sab_hr_fin_1){
                $('#sabErro01').modal('show');
                $('#sab_hr_ini_1').val('');
            }
        }
    }
}) 

$('#sab_hr_fin_1').blur(function(){
    if($('#sab_hr_ini_1').val() != '' && $('#sab_hr_fin_1').val() != ''){     
        var sab_hr_ini_1 = Date.parse('01/01/2015 '+$('#sab_hr_ini_1').val());
        var sab_hr_fin_1 = Date.parse('01/01/2015 '+$('#sab_hr_fin_1').val());

        if($('#sab_hr_ini_2').val() != ''){
            var sab_hr_ini_2 = Date.parse('01/01/2015 '+$('#sab_hr_ini_2').val());
            if(sab_hr_ini_2 < sab_hr_fin_1){
                $('#sabErro02').modal('show');
                $('#sab_hr_ini_2').val('');

            }else if($('#sab_hr_fin_2').val() != ''){
                var sab_hr_fin_2 = Date.parse('01/01/2015 '+$('#sab_hr_fin_2').val());
                
                if(sab_hr_ini_2 > sab_hr_fin_2){
                    $('#sabErro03').modal('show');
                    $('#sab_hr_ini_2').val('');
                }else if(sab_hr_ini_1 > sab_hr_fin_1){
                    $('#sabErro01').modal('show');
                    $('#sab_hr_ini_1').val('');
                }
            }else{
                if(sab_hr_ini_1 > sab_hr_fin_1){
                    $('#sabErro01').modal('show');
                    $('#sab_hr_ini_1').val('');
                }
            }
        }else{
            if(sab_hr_ini_1 > sab_hr_fin_1){
                $('#sabErro01').modal('show');
                $('#sab_hr_ini_1').val('');
            }
        }
    }
})

$('#sab_hr_ini_2').blur(function(){
    if($('#sab_hr_ini_1').val() != '' && $('#sab_hr_fin_1').val() != ''){     
        var sab_hr_ini_1 = Date.parse('01/01/2015 '+$('#sab_hr_ini_1').val());
        var sab_hr_fin_1 = Date.parse('01/01/2015 '+$('#sab_hr_fin_1').val());

        if($('#sab_hr_ini_2').val() != ''){
            var sab_hr_ini_2 = Date.parse('01/01/2015 '+$('#sab_hr_ini_2').val());
            if(sab_hr_ini_2 < sab_hr_fin_1){
                $('#sabErro02').modal('show');
                $('#sab_hr_ini_2').val('');

            }else if($('#sab_hr_fin_2').val() != ''){
                var sab_hr_fin_2 = Date.parse('01/01/2015 '+$('#sab_hr_fin_2').val());
                
                if(sab_hr_ini_2 > sab_hr_fin_2){
                    $('#sabErro03').modal('show');
                    $('#sab_hr_ini_2').val('');
                }else if(sab_hr_ini_1 > sab_hr_fin_1){
                    $('#sabErro01').modal('show');
                    $('#sab_hr_ini_1').val('');
                }
            }else{
                if(sab_hr_ini_1 > sab_hr_fin_1){
                    $('#sabErro01').modal('show');
                    $('#sab_hr_ini_1').val('');
                }
            }
        }else{
            if(sab_hr_ini_1 > sab_hr_fin_1){
                $('#sabErro01').modal('show');
                $('#sab_hr_ini_1').val('');
            }
        }
    }
})

$('#sab_hr_fin_2').blur(function(){
    if($('#sab_hr_ini_1').val() != '' && $('#sab_hr_fin_1').val() != ''){     
        var sab_hr_ini_1 = Date.parse('01/01/2015 '+$('#sab_hr_ini_1').val());
        var sab_hr_fin_1 = Date.parse('01/01/2015 '+$('#sab_hr_fin_1').val());

        if($('#sab_hr_ini_2').val() != ''){
            var sab_hr_ini_2 = Date.parse('01/01/2015 '+$('#sab_hr_ini_2').val());
            if(sab_hr_ini_2 < sab_hr_fin_1){
                $('#savErro02').modal('show');
                $('#sav_hr_ini_2').val('');

            }else if($('#sab_hr_fin_2').val() != ''){
                var sab_hr_fin_2 = Date.parse('01/01/2015 '+$('#sab_hr_fin_2').val());
                
                if(sab_hr_ini_2 > sab_hr_fin_2){
                    $('#sabErro03').modal('show');
                    $('#sab_hr_ini_2').val('');
                }else if(sab_hr_ini_1 > sab_hr_fin_1){
                    $('#sabErro01').modal('show');
                    $('#sab_hr_ini_1').val('');
                }
            }else{
                if(sab_hr_ini_1 > sab_hr_fin_1){
                    $('#sabErro01').modal('show');
                    $('#sab_hr_ini_1').val('');
                }
            }
        }else{
            if(sab_hr_ini_1 > sab_hr_fin_1){
                $('#sabErro01').modal('show');
                $('#sab_hr_ini_1').val('');
            }
        }
    }
})