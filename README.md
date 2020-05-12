# TDB Schema SEO
Add structured data (schema.org) to your WordPress news, blog and pages.

## Description ##
**TDB Schema SEO** is a WordPress plugin. It improves SEO by adding structured data (schema.org) to your news, blog and pages, and enhance your appearance in Google Search results.
The data are added in JSON-LD format using shortcodes.
It also includes addons for WPBakery Page Builder.

Available schema:
- **FAQPage**: [https://schema.org/FAQPage](https://schema.org/FAQPage)
- **Product**: [https://schema.org/Product](https://schema.org/Product)
- **LocalBusiness**: [https://schema.org/LocalBusiness](https://schema.org/LocalBusiness)
- **Service**: [https://schema.org/Service](https://schema.org/Service)

More information are available in spanish on [https://www.todobravo.es/desarrollo-web/](https://www.todobravo.es/desarrollo-web/).

## Installation ##
1. Upload the folder to the `/wp-content/plugins/` directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.

## Usage with WPBakery ##
The easiet method: just add your WPBakery element available in the Todobravo panel.

## Usage with shortcodes ##
Standard WordPress shortcodes are available:

### FAQPage ###
    [tdb_schema_seo_faqpage][tdb_schema_seo_faqitem q="Question 1"]Answer of the question 1[/tdb_schema_seo_faqitem][tdb_schema_seo_faqitem q="Question 2"]Answer of the question 2[/tdb_schema_seo_faqitem][/tdb_schema_seo_faqpage]

### Product ###
    [tdb_schema_seo_product paramter1="" parameters2=""]

Parameters list:
- name, description, mpn, sku, brand, ratingvalue, reviewcount, reviewratingvalue, reviewauthor, reviewbody, offercount, lowprice, highprice, pricecurrency
- images: list of id images separate with comma

### LocalBusiness ###
    [tdb_schema_seo_localbusiness paramter1="" parameters2=""]

Parameters list:
- id, memberof, name, description, pricerange, streetaddress, addresslocality, addressregion, postalcode, addresscountry, latitude, longitude, url, telephone, hasmap, ratingvalue, reviewcount
- images: list of id images separate with comma

### Service ###
    [tdb_schema_seo_service paramter1="" parameters2=""]

Parameters list:
- name, description, servicetype, provider, brand, offercount, lowprice, highprice, pricecurrency
- areaserved: list of areas separate with comma
- images: list of id images separate with comma

## License

This project is licensed under the GPL v3 - see the [LICENSE.md](LICENSE.md) file for details.