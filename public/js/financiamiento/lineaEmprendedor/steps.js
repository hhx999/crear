$(function ()
{
    $("#wizard").steps({
          headerTag: "h2",
          bodyTag: "section",
          transitionEffect: "slideLeft",
          enableAllSteps: true,
                onStepChanging: function (event, currentIndex, newIndex)
                  {
                    return $("#formLineaEmprendedor").valid();
                  },
                onFinished: function (event, currentIndex) 
                  {
                    $("#formLineaEmprendedor").submit();
                  }
      });
});