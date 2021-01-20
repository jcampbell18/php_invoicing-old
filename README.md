# [Invoicing Project (old)](https://github.com/jcampbell18/php_invoicing-old)

- This was a project that had been used it as my personal invoicing system when I was a General Contractor. It was written in PHP using MYSQL database integration, HTML and CSS. I was able to save my pictures to each project site, send bids and invoices to clients, as well as keeping track of expenses and mileage.

- created for personal business use (highlights):
  - invoicing
  - bids
  - reciept tracking
  - mileage tracking
  - vendors
  - clients
  - project sites

![DrawIO](https://github.com/jcampbell18/php_invoicing-old/blob/main/invoicing_system.png)

- Contractor logs in, and is redirected to Dashboard
  - Contractor navigates to:
    - Vehicles
      - adds a Vehicle
    - Clients
      - adds a Client
  
  - Client requests a bid for a property (aka Project Site)
    - Contractor navigates to Project Sites
      - adds a Project Site
        - automatically creates a folder in projectsites with address as name
          - `/projectsites/123 N Example Rd`
    - Contractor navigates to Bids
      - adds a Bid, referencing the Project Site and Client

  - Client approves the bid
    - Contractor navigates to Bids
      - clicks the approve button on the Bid
        - Invoice created, referencing all information from Bid including Bid #
          - Invoice Id# 0001
        - Folders and subfolders are automatically created under projectsites directory and address of project site, with labels Images and Receipts and Invoice reference
          - `/projectsites/123 N Example Rd/Images/INV_0001`
          - `/projectsites/123 N Example Rd/Receipts/INV_0001`

  - Contractor buys materials for project
    - Contractor navigates to Expenses and logs all Expenses, referencing to invoice
    - Contractor navigates to Mileage and logs mileage for hardware store, referencing invoice, and vehicle
    - Contractor scans receipt and transfer receipt via FTP
      - tranfsers to `/projectsites/123 N Example Rd/Receipts/INV_0001`
  - Contractor starts and completes project
    - Contractor takes pictures of project throughout and transfers images via FTP
      - transfers to `/projectsites/123 N Example Rd/Images/INV_0001`
    - Contractor finalizes invoice, and prints to PDF
      - invoice will contain private information, such as project costs, profit, amount to save for potential taxes, etc...
    - Contractor emails Client the invoice and login credentials for the ability to view the invoice online and view all images

  - Client pays Contractor
    - Contractor navigates to invoice, marks as paid and references the check number


Tools:  
- [x] PHP 5.x
- [x] MYSQL
- [x] HTML/CSS/JS
