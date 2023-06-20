<div class="col-xl-9" id="container"></div>
<link rel="stylesheet" href="https://unpkg.com/bpmn-js@11.5.0/dist/assets/bpmn-js.css">
<link rel="stylesheet" href="https://unpkg.com/bpmn-js@11.5.0/dist/assets/diagram-js.css">
<link rel="stylesheet" href="https://unpkg.com/bpmn-js@11.5.0/dist/assets/bpmn-font/css/bpmn.css">
<!-- modeler distro -->
<script src="https://unpkg.com/bpmn-js@11.5.0/dist/bpmn-navigated-viewer.development.js"></script>
<script>
  var diagramUrl = 'https://naikbnk.link/index.php/api/bpmn/show';
  // modeler instance
  var bpmnModeler = new BpmnJS({
    container: '#container',
    keyboard: {
      bindTo: window
    }
  });

  async function exportDiagram() 
  {
    try 
    {
      bpmnModeler.invoke(function(elementRegistry, modeling) {
        // once user updates id in input field
        var oldID   = $("#old_id").val();
        var newID   = $("#id").val();
        var newName = $("#name").val();
        var serviceTaskShape = elementRegistry.get(oldID);
        modeling.updateProperties(serviceTaskShape, {
          id: newID,
          name: newName
        });
      });           
      var result = await bpmnModeler.saveXML({ format: true });
      $.ajax({
            type: 'POST',
            url: "https://naikbnk.link/index.php/api/bpmn/save",
            data: result.xml,
            dataType: "text",
            success: function(resultData) {                   
             alert("Save Complete"); 
           }
      });          
    } 
    catch (err) 
    {
      console.error('could not save BPMN 2.0 diagram', err);
    }
  }

  async function openDiagram(bpmnXML) {
    // import diagram
    try 
    {
      await bpmnModeler.importXML(bpmnXML).then(function(){
        // access modeler components
        var canvas = bpmnModeler.get('canvas');
        // zoom to fit full viewport
        canvas.zoom('fit-viewport', 'auto');            
        var eventBus = bpmnModeler.get('eventBus');
        // you may hook into any of the following events
        var events = [
          'element.click'
        ];
        events.forEach(function(event){
          eventBus.on(event, function(e){
            $("#old_id").val(e.element.id);
            $("#id").val(e.element.id);
          });
        });           
      });
    } 
    catch (err) 
    {
      console.error('could not import BPMN 2.0 diagram', err);
    }
  }


  // load external diagram file via AJAX and open it
  $.get(diagramUrl, openDiagram, 'text');
  // wire save button
  $('#save-button').click(exportDiagram);
</script>  