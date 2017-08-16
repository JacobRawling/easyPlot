# easyPlot
A web-package that easily allows users to dump plots and easily share them with other people. Aimed specifically at members of the ATLAS collaboration. 

## Where to put your plots 

The reader assumes you store projects in the following strucutre
  project_name
   version_name
    plot_collection_name_1
    plot_collection_name_2
    ...
    
You have the option of putting plots in ./pages/plots if you want them proected and only accessible by the .htaccess protected atlas-plots/index.php or you can put proejcts in ./pages/public_plots     

## Project information

You can optionally put in a "info.txt" file in every folder and subfolder of a project. This will be piped into the page when loaded, and read as html code. 

If the user is as it the index.php page without requesting any project or subfolder (via php GET information) then ./pages/info/info.txt will be piped into the page. 


