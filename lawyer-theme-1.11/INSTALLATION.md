# Lehoia WordPress Theme - Installation Guide

## Quick Installation

### Method 1: Upload via WordPress Admin (Recommended)
1. Download the `lehoia.zip` file
2. Log into your WordPress admin dashboard
3. Go to **Appearance > Themes**
4. Click **Add New**
5. Click **Upload Theme**
6. Choose the `lehoia.zip` file
7. Click **Install Now**
8. Click **Activate**

### Method 2: FTP Upload
1. Extract the `lehoia.zip` file
2. Upload the `lehoia` folder to `/wp-content/themes/` via FTP
3. Go to **Appearance > Themes** in WordPress admin
4. Click **Activate** on the Lehoia theme

## Post-Installation Setup

### 1. Configure Theme Settings
Go to **Appearance > Customize** and configure:
- **Site Identity**: Upload logo, set site title
- **Lawyer Information**: Name, title, bio
- **Contact Information**: Phone, email, address
- **Colors**: Customize brand colors if needed

### 2. Set Up Menus
1. Go to **Appearance > Menus**
2. Create a new menu called "Primary Menu"
3. Add pages: Home, About, Practice Areas, Case Results, Contact
4. Assign to "Primary Menu" location

### 3. Create Essential Pages
Create these pages with the following content structure:

#### Home Page
- Set as your homepage in **Settings > Reading**
- The theme will automatically display all sections

#### About Page
- Add lawyer biography
- Include professional photo
- List credentials and experience

#### Contact Page
- Add contact form
- Include office address
- Add Google Maps embed (optional)

### 4. Add Content Using Custom Post Types

#### Practice Areas
1. Go to **Practice Areas > Add New**
2. Add title (e.g., "Criminal Defense")
3. Add description and details
4. Set featured image
5. Publish

#### Case Results
1. Go to **Case Results > Add New**
2. Add case title and result amount
3. Add case description
4. Set featured image
5. Publish

#### Testimonials
1. Go to **Testimonials > Add New**
2. Add client name as title
3. Add testimonial content
4. Add client photo as featured image
5. Publish

### 5. Configure Widgets (Optional)
Go to **Appearance > Widgets** to add content to:
- Sidebar (if using blog)
- Footer widget areas

### 6. Set Up Contact Form

The theme includes basic contact form functionality. For advanced forms, install a plugin like:
- Contact Form 7
- WPForms
- Gravity Forms

## Localhost Testing Setup

### Requirements
- Local server environment (XAMPP, WAMP, MAMP, or Local by Flywheel)
- WordPress installation
- PHP 7.4+ and MySQL 5.6+

### Steps for Localhost
1. Install WordPress on your local server
2. Follow the installation steps above
3. Import sample content (if provided)
4. Configure theme settings
5. Test all functionality

### Using Local by Flywheel (Recommended)
1. Download and install Local by Flywheel
2. Create new local WordPress site
3. Install Lehoia theme
4. Import demo content
5. Start customizing

## Theme Features Setup

### Google Fonts
Fonts are loaded automatically:
- Playfair Display (headings)
- Inter (body text)

### SEO Setup
The theme is SEO-ready. For enhanced SEO, install:
- Yoast SEO
- RankMath

### Performance Optimization
- Images are optimized automatically
- CSS and JS are minified
- Consider installing a caching plugin

### Social Media Integration
Add social media links in **Appearance > Customize > Social Media**

## Customization Tips

### Colors
Modify colors in `style.css` CSS variables:
```css
:root {
  --primary: 43 74% 66%; /* Gold accent */
  --background: 220 23% 11%; /* Dark navy */
  /* Add more custom colors */
}
```

### Typography
Change fonts by modifying the Google Fonts link in `header.php`

### Layout Modifications
Edit template files:
- `index.php` - Homepage
- `header.php` - Site header
- `footer.php` - Site footer
- `single-practice_areas.php` - Practice area pages

## Troubleshooting

### Common Issues

**Theme not displaying correctly:**
- Clear cache
- Check if all files uploaded correctly
- Verify PHP version compatibility

**Images not showing:**
- Check file permissions
- Verify image paths in theme files
- Upload images to `/assets/` folder

**Contact form not working:**
- Check email configuration
- Verify PHP mail function
- Consider using a contact form plugin

**Responsive issues:**
- Clear browser cache
- Check CSS media queries
- Test on actual devices

### Support
For technical support:
1. Check theme documentation
2. Verify WordPress and PHP versions
3. Test with default WordPress theme
4. Contact theme developer

## File Structure Reference
```
lehoia/
├── style.css                    # Main stylesheet
├── index.php                    # Homepage template
├── header.php                   # Header template
├── footer.php                   # Footer template
├── functions.php                # Theme functions
├── single-practice_areas.php    # Practice area template
├── archive-practice_areas.php   # Practice areas archive
├── assets/                      # Images and media
├── js/                         # JavaScript files
├── README.md                   # Theme information
└── INSTALLATION.md             # This file
```

## Next Steps
1. Customize content for your law firm
2. Add your branding and colors
3. Test all functionality
4. Launch your website
5. Set up analytics and monitoring

For additional customization or support, consult the theme documentation or contact the developer.