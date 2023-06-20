<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <title>Hello World</title>
    <!-- required modeler styles -->
    <link rel="stylesheet" href="https://unpkg.com/bpmn-js@11.5.0/dist/assets/bpmn-js.css">
    <link rel="stylesheet" href="https://unpkg.com/bpmn-js@11.5.0/dist/assets/diagram-js.css">
    <link rel="stylesheet" href="https://unpkg.com/bpmn-js@11.5.0/dist/assets/bpmn-font/css/bpmn.css">
    <!-- modeler distro -->
    <script src="https://unpkg.com/bpmn-js@11.5.0/dist/bpmn-modeler.development.js"></script>
    <!-- needed for this example only -->
    <script src="https://unpkg.com/jquery@3.3.1/dist/jquery.js"></script>
    <link rel="stylesheet" href="<?php echo base_url(); ?>themes/docy/diagram/all.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>themes/docy/diagram/app.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>themes/docy/diagram/styles.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>themes/docy/diagram/properties-panel.css">    
  </head>
  <body>
    <div id="container"></div>
    <div id="properties-panel-container">
      <div style="height: 100%" class="bio-properties-panel-container">
        <div class="bio-properties-panel open">
          <div class="bio-properties-panel-header">
            <div class="bio-properties-panel-group-header open">
              <div title="General" class="bio-properties-panel-group-header-title">General</div>
            </div>
          </div>
          <div class="bio-properties-panel-group" data-group-id="group-general">
            <div class="bio-properties-panel-group-entries open">
              <div class="bio-properties-panel-entry" data-entry-id="id">
                <div class="bio-properties-panel-textfield">
                  <label for="bio-properties-panel-id" class="bio-properties-panel-label">ID</label>
                  <input id="old_id" type="hidden" name="old_id" spellcheck="false" autocomplete="off" class="bio-properties-panel-input">
                  <input id="id" type="text" name="id" spellcheck="false" autocomplete="off" class="bio-properties-panel-input">
                </div>
              </div>              
              <div class="bio-properties-panel-entry">
                <div class="bio-properties-panel-textfield">
                  <label for="bio-properties-panel-name" class="bio-properties-panel-label">Name</label>
                  <input id="name" name="name" type="text" spellcheck="false" class="bio-properties-panel-input" />
                </div>
              </div>
              <div class="bio-properties-panel-entry bio-properties-panel-checkbox-entry">
                <div class="bio-properties-panel-checkbox">
                  <center>
                    <button id="save-button"
                      style="
                      display: inline-flex;
                      align-items: center;
                      height: 32px;
                      padding: 0 12px;
                      font-size: 13px;
                      font-weight: 500;
                      color: white;
                      background-color: rgb(21, 21, 21);
                      cursor: pointer;
                      border: 1px solid rgb(52,52,52);
                      border-radius: 4px;
                      text-decoration: none;
                      font-family: system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Ubuntu,Droid Sans,Helvetica Neue,sans-serif;
                      -webkit-font-smoothing: antialiased;
                      -moz-osx-font-smoothing: antialiased;
                      z-index: 99999999999;">Simpan
                    </button>
                  </center>
                </div>
              </div>             
            </div>
          </div>
        </div>
      </div>
    </div>
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
  </body>
</html>
