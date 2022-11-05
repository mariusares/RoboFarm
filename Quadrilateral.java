import java.awt.*;

public class Quadrilateral extends Shape implements Rotatable {
    public Point[] points;

    public Quadrilateral(Point centerPoint, Point[] points) {
        super( Color.BLACK, false,  centerPoint.getX(),centerPoint.getY());
        this.points = points;
    }
    public Quadrilateral(Point centerPoint, Point p1, Point p2, Point p3, Point p4){
        super(Color.BLACK,false, centerPoint.getX(),centerPoint.getY());
        this.points = new Point[]{p1,p2,p3,p4};
    }
    public Quadrilateral(Rectangle rectangle){
        super(Color.BLACK, false, rectangle.getxCenter(),rectangle.getyCenter());
        Point p1 = new Point(rectangle.getxCenter() - (rectangle.getWidth() / 2), rectangle.getyCenter() - (rectangle.getHeight() / 2));
        Point p2 = new Point(rectangle.getxCenter() + (rectangle.getWidth() / 2) , rectangle.getyCenter() - (rectangle.getHeight() / 2));
        Point p3 = new Point(rectangle.getxCenter() + (rectangle.getWidth() / 2), rectangle.getyCenter() + (rectangle.getHeight() / 2));
        Point p4 = new Point(rectangle.getxCenter()- (rectangle.getWidth() / 2), rectangle.getyCenter() + (rectangle.getHeight() / 2));

        this.points = new Point[]{p1,p2,p3,p4};
    }

    @Override
        public BoundingBox setupBoundingBox () {

          return  new BoundingBox( new Point (getxCenter(),getyCenter() ), new Point( getxCenter() , getyCenter() )) ;
       }

    @Override
    public void drawShape(Graphics g, boolean displayShapeName, boolean displayBoundingBox) {
        g.setColor(getColor());

        if(getFilled()){
            g.fillPolygon(new int[]{points[0].getX(),points[1].getX(),points[2].getX(),points[3].getX()},
                    new int[]{points[0].getY(),points[1].getY(),points[2].getY(),points[3].getY()},points.length);
        }
        else{
            g.drawPolygon(new int[]{points[0].getX(),points[1].getX(),points[2].getX(),points[3].getX()},
                    new int[]{points[0].getY(),points[1].getY(),points[2].getY(),points[3].getY()},points.length);
        }

        if(displayShapeName)
            drawName(g);

        if(displayBoundingBox)
            drawBoundingBox(g);
    }
    @Override
    public String toString() {
        return "Quadrilateral{" +
                "Points" + points +
                '}' ;
    }
}
