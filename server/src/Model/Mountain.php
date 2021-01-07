<?php
    require("Database.php");
        
    /**
     * Variables:
     * id, name, height, location, description, image
     */
    class Mountain implements JsonSerializable
    {
        private ?int $id;
        private string $name;
        private ?int $height;
        private string $location;
        private ?string $description;
        private ?string $image;

        public function __construct($id = null, $name = "", $height = null, $location = "", $description = "", $image = "")
        {
            $this->id = $id;
            $this->name = $name;
            $this->height = $height;
            $this->location = $location;
            $this->description = $description;
            $this->image = $image;
        }
        
        public function jsonSerialize(): array
        {
            return [
                'id' => $this->id,
                'name' => $this->name,
                'height' => $this->height,
                'location' => $this->location,
                'description' => $this->description,
                'image' => $this->image
            ];
        }

        /**
         * getAll
         *
         * @return array
         */
        public static function getAll(): array
        {
            $conn = Database::getDatabase();
            $conn->prepare("SELECT * FROM mountain");
            $mountains = $conn->getAllObjects();

            if (! $mountains) {
                $mountains = ["There aren't mountains in the database"];
            }
            
            return $mountains;
        }

        /**
         * getOne
         *
         * @param  string|int $id
         * @return array
         */
        public static function getOne($id): Mountain
        {
            $conn = Database::getDatabase();
            $conn->prepare("SELECT * FROM mountain WHERE id = ?", [$id]);
            $data = $conn->getRow();
            $mountain = new Mountain($id, $data["name"], $data["height"], $data["location"], $data["description"], $data["image"]);
            
            if (! $mountain) {
                $mountain = ["This mountain does not exist"];
            }

            return $mountain;
        }

        /**
         * insert
         *
         * @param  mixed $params
         * @return void
         */
        public function insert(): void
        {
            $conn = Database::getDatabase();
            
            $conn->prepare(
                "INSERT INTO mountain (name, height, location, description, image) 
                VALUES (?, ?, ?, ?, ?)",
                [$this->name, $this->height, $this->location, $this->description, $this->image]
            );
        }

        /**
         * delete
         *
         * @param  mixed $id
         * @return void
         */
        public static function delete($id): void
        {
            $conn = Database::getDatabase();
            try {
                $conn->prepare("DELETE FROM mountain WHERE id = ?", [$id]);
            } catch (Error $e) {
                echo "Delete failed: $e";
            }
        }

        /**
         * update
         *
         * @return void
         */
        public function update(): void
        {
            $conn = Database::getDatabase();
            $conn->prepare(
                "UPDATE mountain 
                 SET name = ?, height = ?, location = ?, description = ?, image = ?
                 WHERE id = ?",
                [$this->name, $this->height, $this->location, $this->description, $this->image, $this->id]
            );
        }
        
        /**
         * validateInsert
         *
         * @param  mixed $input
         * @return bool
         */
        public static function validateParams(array $input): bool
        {
            if (! isset($input['name'])) {
                return false;
            }
            if (! isset($input['height'])) {
                return false;
            }
            if (! isset($input['location'])) {
                return false;
            }

            return true;
        }

        // Getters and Setters
        /**
         * Get the value of id
         */
        public function getId()
        {
            return $this->id;
        }

        /**
         * Set the value of id
         *
         * @return  self
         */
        public function setId($id)
        {
            $this->id = $id;

            return $this;
        }

        /**
         * Get the value of name
         */
        public function getName()
        {
            return $this->name;
        }

        /**
         * Set the value of name
         *
         * @return void
         */
        public function setName($name): void
        {
            $this->name = $name;
        }

        /**
         * Get the value of height
         */
        public function getHeight()
        {
            return $this->height;
        }

        /**
         * Set the value of height
         *
         * @return  void
         */
        public function setHeight($height): void
        {
            $this->height = $height;
        }

        /**
         * Get the value of location
         */
        public function getLocation()
        {
            return $this->location;
        }

        /**
         * Set the value of location
         *
         * @return  void
         */
        public function setLocation($location): void
        {
            $this->location = $location;
        }

        /**
         * Get the value of description
         */
        public function getDescription()
        {
            return $this->description;
        }

        /**
         * Set the value of description
         *
         * @return  void
         */
        public function setDescription($description): void
        {
            $this->description = $description;
        }

        /**
         * Get the value of image
         */
        public function getImage()
        {
            return $this->image;
        }

        /**
         * Set the value of image
         *
         * @return  void
         */
        public function setImage($image): void
        {
            $this->image = $image;
        }
    }
