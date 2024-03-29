create database Nail_dtbase;
use Nail_dtbase;

CREATE TABLE users (
    UserID INT AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(50) NOT NULL,
    lastname VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(10) NOT NULL,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(100) NOT NULL
);
select*from users;

CREATE TABLE Feedback (
    FeedbackID INT AUTO_INCREMENT PRIMARY KEY,
	username VARCHAR(50) NOT NULL,
    content TEXT NOT NULL
);
ALTER TABLE Feedback
ADD created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP;

INSERT INTO Feedback (username, content) VALUES
('Hoang Anh', 'I am all about trying out very intrinsic designs on my nails and it is really hard to find a place that can match exactly what I show them but that was not even close to an issue at NAILSPA'),
('Thuy Duong', 'Best manicure I have had yet. The employees were so nice, and everything was so easy! My gel manicure has lasted me longer than any other salon I have ever been to. Highly recommend!'),
('Van Thi', 'Beautiful and clean space. Super fun vibe... the staff was very courteous, and my technician checked to make sure I was happy with the color I chose before proceeding'),
('Ngoc Khanh', 'The services are so quick, but still come out incredible. I always leave NAILSPA in the best mood.'),
('Tien Quan', 'The vibes are exactly what you want when getting a manicure. The staff is super friendly and knowledgeable. Can not wait to go back!'),
('Ronaldo', 'I love how the nail designs turned out and the team was so helpful in finding the colors I was looking for.'),
('Messi', 'Love that they have a monthly membership so you can get your mani and pedi as often as you want. NAILSPA is also very clean and cute. Def try it out!'),
('Neymar', 'The attention to detail and professionalism is unmatched!!!'),
('Haaland', 'I got a gel pedicure done here, and it was very well done and lasted for an eternity');
select*from Feedback;

CREATE TABLE Categories (
    CategoryID INT AUTO_INCREMENT PRIMARY KEY,
    CategoryName VARCHAR(100) NOT NULL
);

INSERT INTO Categories(CategoryName) VALUES
('Pure polish'),
('Nail care'),
('Sets');

CREATE TABLE Products (
    ProductID INT AUTO_INCREMENT PRIMARY KEY,
    ProductName VARCHAR(100) NOT NULL,
    Description TEXT,
    Price DECIMAL(10, 2) NOT NULL,
	OldPrice DECIMAL(10, 2) NOT NULL,
    Quantity INT,
    ImageURL VARCHAR(255),
    CategoryID INT,
    FOREIGN KEY (CategoryID) REFERENCES Categories(CategoryID)
);
INSERT INTO Products (ProductName, Description, Price, OldPrice,ImageURL, CategoryID)
VALUES 
('Marigold', 'Marigold is a full coverage, creamy yellow orange, the perfect color to transition between seasons. In its iconic bottle with rose gold dome, this long-wearing, 8-free formula delivers highly pigmented color and is made in the USA.', 19.99,22, '../../img/image_shop/marigold.webp', 1),
('Tokyo Blossom', 'From our Fall/Winter 2023 Collection, this modern twist on mauve was inspired by a walk through Tokyo during cherry blossom season. Reach for this pink like you would any neutral polish.', 12.50,15.50, '../../img/image_shop/tokyoblossom.webp', 1),
('Lilac', 'From our Fall/Winter 2023 collection, this new take on lilac makes for a super modern and slightly edgy look. Plus, every bottle of Pure Polish is long-wearing, 8-free, vegan-friendly, cruelty-free, gluten-free, and made in the USA.', 15.75,16.75, '../../img/image_shop/lilac.webp', 1),
('Royal Fuchsia', 'From the Fall/Winter 2023 collection, Royal Fuchsia is a bright, uplifting purple based pink that exudes self assurance (and is the color of the moment in fashion!). Plus, this long-wearing formula delivers highly pigmented color and is made in the USA. Free of the eight most toxic ingredients found in nail color.', 14.99,17, '../../img/image_shop/RoyalFuschia.webp', 1),
('Plum Pearl', 'From the Fall/Winter 2023 collection, Plum Pearl is a medium plum shade with a hint of fuchsia opalescence.', 22.00,24, '../../img/image_shop/PlumPearl.webp', 1),
('Latte', 'From our F/W 2023 Collection, Latte is a full coverage fleshy beige and a subtle hint of pink that gives it the perfect undertone to work well with all skin colors. Made with 8-free, cruelty-free, paraben free, gluten free, and vegan ingredients and made in the USA.', 8.95,12.5, '../../img/image_shop/Latte.webp', 1),
('Smoky Topaz', 'From our Fall/Winter 2023 collection, Smoky Topaz is a medium smoky brown with hints of platinum pearl. 8-free, cruelty-free, paraben free, gluten free, vegan and made in the USA.', 10.99,12, '../../img/image_shop/Smoky.webp', 1),
('Moss', 'From our Fall/Winter 2023 collection, Moss is a deep warm shade of green. Every bottle of Pure Polish is long-wearing, 8-free, vegan-friendly, cruelty-free, gluten-free, and made in the USA.', 18.50,22.00, '../../img/image_shop/Moss.webp', 1),
('Southern Belle', 'A sheer pink shade for a perfect, year-round, neutral.The color you want, without the toxins. Pure Polish is a non-toxic, highly pigmented range of color curated by our in-house experts. Our formula is 8-free, cruelty-free, paraben free, gluten free and vegan. Made in the USA.', 27.75,30,'../../img/image_shop/SouthernBelle.webp', 1),
('Oxblood', 'From our Fall/Winter 2023 collection, Oxblood is a dark, oxidized purple-based red, and free of the eight most toxic ingredients found in nail color. In its iconic bottle with rose gold dome, this long-wearing formula delivers highly pigmented color and is made in the USA.', 14.75,17.25, '../../img/image_shop/Oxblood.webp', 1),
('Big Poppy', 'This medium-toned, classic red is a showstopper that plays well with others. Plus, every bottle of Pure Polish is long-wearing, 8-free, vegan-friendly, cruelty-free, gluten-free, and made in the USA.', 14.50,15.55, '../../img/image_shop/BigPoppy.webp', 1),
('Number 1', 'Classic red gets a dark, tonal twist, with equally sophisticated results. Plus, every bottle of Pure Polish is long-wearing, 8-free, vegan-friendly, cruelty-free, gluten-free, and made in the USA.', 14.60,17, '../../img/image_shop/Number1.webp', 1),
('Tradition', 'This rich shimmery red is timeless and celebratory — everything we love about the holiday season. Plus, every bottle of Pure Polish is long-wearing, 8-free, vegan-friendly, cruelty-free, gluten-free, and made in the USA.', 14.50,15.50, '../../img/image_shop/Tradition.webp', 1),
('Pretty in Pink', 'A candy-colored pink with a subtle purple undertone – sure to bring out sweetness and smiles. Plus, every bottle of Pure Polish is long-wearing, 8-free, vegan-friendly, cruelty-free, gluten-free, and made in the USA.', 14.00,16, '../../img/image_shop/PrettyinPink.webp', 1),
('Tai', 'This tropical, juicy pink is the color of a hot summer day. Plus, every bottle of Pure Polish is long-wearing, 8-free, vegan-friendly, cruelty-free, gluten-free, and made in the USA.', 14.19,17.25, '../../img/image_shop/Tai.webp', 1),
('1636', 'A can’t-go-wrong iconic burgundy red for any occasion. Plus, every bottle of Pure Polish is long-wearing, 8-free, vegan-friendly, cruelty-free, gluten-free, and made in the USA.', 14.50,15.25, '../../img/image_shop/1636.webp', 1),
('Havana', 'The hottest shade of bright and sultry orange with red undertones. Like wearing fire on your fingers. Plus, every bottle of Pure Polish is long-wearing, 8-free, vegan-friendly, cruelty-free, gluten-free, and made in the USA.', 14.20,15.50, '../../img/image_shop/Havana.webp', 1),

('Cuticle Oil Trio', 'Our Nourishing Cuticle Oil Rollerball has developed a following, so we proudly offer it in a set of three—one for home, one for your bag, and one just in case your best friend "borrows" it. Enjoy your favorite, soothing burst of natural tea tree oil, vitamin E and jojoba oil, with the invigorating scent of lavender and lemon anytime, anywhere. Always cruelty-free, paraben free, gluten free and vegan. Made in the USA.',56.50,60, '../../img/image_shop/CuticleOilRollerballTrio.webp', 2),
('Pure Strength Nail ', 'Restore your nails back to health with this best-selling, multi-use, vegan formula. Made with over 80% plant-based ingredients, Pure Strength works hard to strengthen nails over time with a protective coating. Use on natural nails that need a boost or after removing enhancements like gel polish or extensions.Always cruelty-free, paraben free, gluten free and vegan. Made in the USA.',20,22, '../../img/image_shop/PureStreingthcopia.webp', 2),
('Cuticle Oil', 'Like a lip balm for your hands, our newly enhanced Cuticle Oil formula moisturizes and restores cuticles and promotes healthier, stronger nails. Now made with Marula oil for deeper, longer lasting hydration. Like actress Lily Collins said, “can’t live without it.”', 22,24, '../../img/image_shop/CuticleOilRollerball.webp', 2),
('Perfect Prime ', 'A strong foundation that helps to adhere polish, prevents cracking and staining, and acts as a ridge filler.', 14.95,16, '../../img/image_shop/PerfectPrime.webp', 2),
('Pure Matte ', 'A premium top coat creates a sophisticated, muted, statement. Its velvety smooth finish is long-lasting, protects your natural nail and prevents chipping.', 11.75,13, '../../img/image_shop/Pure-Mate.webp', 2),
('Glass Nail File', 'Achieve a studio-level mani while staying in or on-the-go! This glass nail file is your nail essential to keep nails in tip-top shape. ', 10.00,12, '../../img/image_shop/GlassNailFile.webp', 2),
('Acetone Polish ', 'Use our polish remover to gently and easily erase nail polish of all colors and textures (including glitter and hard-to-remove dark shades) to leave the nails and skin around the nails clean and hydrated. Acetone free and citrus scented.', 17.99,20, '../../img/image_shop/Acetone.webp', 2),
('No Smudge Finisher ', 'A must-have that instantly shortens your polish drying time, reduces nicks and re-moisturizes cuticles.', 20,24, '../../img/image_shop/No-Smudge.webp', 2),
('Deluxe Get Kit', 'Achieve a studio-level mani while staying in. This kit comes with everything you need for a strong start and a glossy finish. What’s included: Pure Shine Top Coat, Perfect Prime Base Coat, No Smudge Finisher Drying Drops, Nourishing Cuticle Oil Dropper, Nail Clippers, Buffer, Nail File, Cuticle Pusher.', 52,55, '../../img/image_shop/Kit-Manicure.webp', 2),

('F/W 2023 Set ', 'Save on a set! Nail your narrative with this boldly curated collection of trending shades. From classic neutrals, to a new take on pink, to the deep mossy green of the fashion season, this set of Pure Polishes is bound to bring out your inner power. A great gift for someone who loves to play with color! Includes: Tokyo Blossom, Lilac, Plum Pearl, Royal Fuchsia, Latte, Smoky Topaz, Moss, Oxblood', 89,93, '../../img/image_shop/FW2023-set.webp', 3),
('Universally Set', 'Save with a set! This collection of 8 Pure Polish shades complement every skin tone. Each color is long-wearing, 8-free, gluten-free, cruelty-free, vegan, and made in the USA. From the leading expert in clean nails and nail care, with over 3 million nail care services and counting. Includes: 90210, Big Poppy, Legally Blonde, Prima Donna, Marrakech, Numbah 12, Reflection, Boss Lady', 89,93,'../../img/image_shop/Universally.webp', 3),
('Skincare Pair Set', 'Soothe, soften and save when you bundle our best-selling, ultra-hydrating Hand Cream and Foot Balm. Anti-Aging Hand Cream A quick-absorbing, non-greasy formula with anti-aging, time-stopping squalene and antioxidant superhero vitamin E, that leaves behind nothing but a slight sheen of radiance. Hydrating Foot Balm A quick-drying balm that extends the life of your pedicure and nourishes tired feet with eucalyptus, menthol and shea butter.', 52,55, '../../img/image_shop/SkincarePairSet.webp', 3),
('Care Collection Set', 'Keep skin in tip-top shape from tip to toe with this set. Our selection of hydrating lotions and scrubs lets you maintain, exfoliate and nourish hands, body and feet. Available in Citrus or Fresh – you decide which scent will bring more joy. What’s included: Body Cream (Citrus or Fresh), Exfoliating Sugar Scrub (Citrus or Fresh), Anti-Aging Hand Cream, Hydrating Foot Balm.', 100,105, '../../img/image_shop/CareCollectionGiftSet.webp', 3);

select*from Products;


CREATE TABLE Appointments (
    AppointmentID INT AUTO_INCREMENT PRIMARY KEY,
    UserID INT,
    EmployeeID INT,
    AppointmentTime DATETIME NOT NULL,
    ServiceType VARCHAR(100) NOT NULL,
    Status VARCHAR(50) NOT NULL,
    FOREIGN KEY (UserID) REFERENCES Users(UserID),
    FOREIGN KEY (EmployeeID) REFERENCES Employees(EmployeeID)
);

CREATE TABLE Employees(
	EmployeeID INT AUTO_INCREMENT PRIMARY KEY,
    FirstName VARCHAR(50) NOT NULL,
    LastName VARCHAR(50) NOT NULL,
    Email VARCHAR(100) NOT NULL,
    Phone VARCHAR(10) NOT NULL,
    Role VARCHAR(50) NOT NULL
);

INSERT INTO Employees (FirstName, LastName, Email, Phone, Role) VALUES
('Kirit', 'Elena', 'kirit@example.com', '1234567890', 'Nail Technician'),
('Sindy', 'Mark', 'sindy@example.com', '1234567891', 'Nail Technician'),
('Jessi', 'Lena', 'jessi@example.com', '1234567892', 'Nail Technician'),
('Bell', 'Mary', 'bell@example.com', '1234567893', 'Nail Technician'),
('Korinn', 'Asa', 'korinn@example.com', '1234567894', 'Nail Technician'),
('Jangsii', '', 'jangsii@example.com', '1234567895', 'Nail Technician');



drop database Nail_dtbase
